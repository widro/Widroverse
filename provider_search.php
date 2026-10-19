<?php
// provider_search.php
// Search U.S. medical providers via the free NPI Registry API (no key).
// Now with more columns + expandable details per row.

function get_input($key) { return isset($_GET[$key]) ? trim($_GET[$key]) : ''; }

$zip  = get_input('zip');
$type = get_input('type');

$errors = [];
if ($zip !== '' && !preg_match('/^\d{5}$/', $zip)) { $errors[] = "Please enter a 5-digit ZIP code."; }

$specialties = [
  "Family Medicine","Internal Medicine","Pediatrics","Obstetrics & Gynecology",
  "Cardiology","Dermatology","Psychiatry","Orthopedic Surgery","Dentist","Pharmacy"
];

$results = [];
$api_error = null;

if (empty($errors) && ($zip !== '' || $type !== '')) {
  $params = [
    'version'      => '2.1',
    'country_code' => 'US',
    'limit'        => '50',
  ];
  if ($zip  !== '') { $params['postal_code'] = $zip; }
  if ($type !== '') { $params['taxonomy_description'] = $type; }

  $url = 'https://npiregistry.cms.hhs.gov/api/?' . http_build_query($params);

  $ch = curl_init($url);
  curl_setopt_array($ch, [
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_CONNECTTIMEOUT => 10,
    CURLOPT_TIMEOUT        => 20,
    CURLOPT_USERAGENT      => 'ProviderSearchDemo/1.1',
  ]);
  $json = curl_exec($ch);
  $curlErr  = curl_error($ch);
  $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
  curl_close($ch);

  if ($curlErr) {
    $api_error = "Network error: $curlErr";
  } elseif ($httpCode >= 400) {
    $api_error = "API returned HTTP $httpCode";
  } else {
    $data = json_decode($json, true);
    if (json_last_error() !== JSON_ERROR_NONE) {
      $api_error = "Failed to parse API response.";
    } else {
      if (!empty($data['results']) && is_array($data['results'])) {
        foreach ($data['results'] as $r) {
          $npi    = $r['number'] ?? '';
          $basic  = $r['basic']  ?? [];

          // Name (individual vs organization)
          if (!empty($basic['first_name']) || !empty($basic['last_name'])) {
            $name = trim(($basic['first_name'] ?? '') . ' ' . ($basic['last_name'] ?? ''));
          } elseif (!empty($basic['organization_name'])) {
            $name = $basic['organization_name'];
          } else { $name = '—'; }

          // Addresses: LOCATION and MAILING
          $addrLoc = ['line1'=>'—','line2'=>'','city'=>'—','state'=>'—','zip'=>'—','phone'=>'—','fax'=>''];
          $addrMail= ['line1'=>'—','line2'=>'','city'=>'—','state'=>'—','zip'=>'—','phone'=>'','fax'=>''];
          if (!empty($r['addresses']) && is_array($r['addresses'])) {
            foreach ($r['addresses'] as $a) {
              $purpose = strtoupper($a['address_purpose'] ?? '');
              $out = [
                'line1' => $a['address_1'] ?? '—',
                'line2' => $a['address_2'] ?? '',
                'city'  => $a['city'] ?? '—',
                'state' => $a['state'] ?? '—',
                'zip'   => $a['postal_code'] ?? '—',
                'phone' => $a['telephone_number'] ?? '',
                'fax'   => $a['fax_number'] ?? '',
              ];
              if ($purpose === 'LOCATION') { $addrLoc  = $out; }
              if ($purpose === 'MAILING')  { $addrMail = $out; }
            }
            // Fallbacks if one is missing
            if ($addrLoc['line1'] === '—' && !empty($r['addresses'][0])) {
              $a = $r['addresses'][0];
              $addrLoc = [
                'line1'=>$a['address_1'] ?? '—', 'line2'=>$a['address_2'] ?? '',
                'city'=>$a['city'] ?? '—', 'state'=>$a['state'] ?? '—',
                'zip'=>$a['postal_code'] ?? '—', 'phone'=>$a['telephone_number'] ?? '',
                'fax'=>$a['fax_number'] ?? ''
              ];
            }
          }

          // Primary taxonomy description for main table
          $taxonomyDesc = '—';
          if (!empty($r['taxonomies']) && is_array($r['taxonomies'])) {
            $primary = null;
            foreach ($r['taxonomies'] as $t) { if (!empty($t['primary'])) { $primary = $t; break; } }
            $t = $primary ?: $r['taxonomies'][0];
            if (!empty($t['desc'])) { $taxonomyDesc = $t['desc']; }
          }

          // Extra fields
          $enumeration_type = $r['enumeration_type'] ?? '—';        // NPI-1 or NPI-2
          $gender           = $basic['gender'] ?? '—';              // individuals
          $enum_date        = $basic['enumeration_date'] ?? '—';
          $last_updated     = $basic['last_updated'] ?? '—';

          // Details payload
          $all_taxonomies = [];
          if (!empty($r['taxonomies'])) {
            foreach ($r['taxonomies'] as $t) {
              $all_taxonomies[] = [
                'primary'        => !empty($t['primary']),
                'code'           => $t['code'] ?? '',
                'grouping'       => $t['grouping'] ?? '',
                'classification' => $t['classification'] ?? '',
                'specialization' => $t['specialization'] ?? '',
                'desc'           => $t['desc'] ?? '',
                'license'        => $t['license'] ?? '',
                'state'          => $t['state'] ?? '',
              ];
            }
          }

          $identifiers = [];
          if (!empty($r['identifiers']) && is_array($r['identifiers'])) {
            foreach ($r['identifiers'] as $id) {
              $identifiers[] = [
                'issuer'   => $id['issuer'] ?? '',
                'desc'     => $id['desc'] ?? '',
                'state'    => $id['state'] ?? '',
                'identifier'=> $id['identifier'] ?? '',
              ];
            }
          }

          $results[] = [
            'npi'    => $npi,
            'name'   => $name,
            'tax'    => $taxonomyDesc,
            'addr'   => $addrLoc,
            'mail'   => $addrMail,
            'etype'  => $enumeration_type,
            'gender' => $gender,
            'enum_date'    => $enum_date,
            'last_updated' => $last_updated,
            'taxonomies'   => $all_taxonomies,
            'identifiers'  => $identifiers,
          ];
        }
      }
    }
  }
}
?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width,initial-scale=1" />
<title>Medical Provider Search (NPI Registry)</title>
<style>
  body { font-family: system-ui,-apple-system,Segoe UI,Roboto,Arial,sans-serif; margin: 24px; }
  h1 { margin: 0 0 12px; font-size: 1.5rem; }
  form { display: grid; gap: 8px; grid-template-columns: 1fr 1fr auto; align-items: end; max-width: 980px; }
  label { font-size: 0.9rem; color: #333; display: block; margin-bottom: 4px; }
  input[type="text"], select { width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 6px; }
  button { padding: 10px 14px; border: 0; border-radius: 6px; cursor: pointer; background: #1a73e8; color: #fff; font-weight: 600; }
  .hint { font-size: 0.85rem; color: #555; margin: 6px 0 18px; }
  .errors { background: #fdecea; color: #b71c1c; padding: 10px; border-radius: 6px; margin: 12px 0; }
  .apierr { background: #fff3cd; color: #7a5a00; padding: 10px; border-radius: 6px; margin: 12px 0; }
  table { width: 100%; border-collapse: collapse; margin-top: 16px; }
  th, td { padding: 10px; border-bottom: 1px solid #eee; vertical-align: top; }
  th { text-align: left; background: #fafafa; }
  .small { font-size: 0.90rem; color: #444; }
  .addr { white-space: nowrap; }
  .actions button { background:#f1f3f4; color:#1f1f1f; border:1px solid #e0e0e0; }
  .details-row { display:none; background:#fcfcfc; }
  .details { padding: 12px 6px 6px 6px; }
  .badge { display:inline-block; padding:2px 6px; font-size:11px; border-radius:999px; background:#e8f0fe; color:#174ea6; margin-left:6px; }
  .muted { color:#666; }
  @media (max-width: 900px) { .addr { white-space: normal; } form { grid-template-columns: 1fr; } }
</style>
<script>
function toggleDetails(id) {
  var row = document.getElementById(id);
  if (!row) return;
  row.style.display = (row.style.display === 'table-row') ? 'none' : 'table-row';
}
</script>
</head>
<body>
  <h1>Find Medical Providers (USA)</h1>
  <p class="hint">Enter a 5-digit ZIP and optionally pick a provider type. Returns up to 50 results. Click “Details” to view mailing address, all specialties, and identifiers.</p>

  <form method="get" action="">
    <div>
      <label for="zip">ZIP code</label>
      <input id="zip" name="zip" type="text" inputmode="numeric" pattern="\d{5}" placeholder="e.g. 94105" value="<?php echo htmlspecialchars($zip, ENT_QUOTES); ?>" />
    </div>
    <div>
      <label for="type">Type of provider</label>
      <select id="type" name="type">
        <option value="">-- Any --</option>
        <?php foreach ($specialties as $s): $sel = ($type === $s) ? 'selected' : ''; ?>
          <option value="<?php echo htmlspecialchars($s, ENT_QUOTES); ?>" <?php echo $sel; ?>><?php echo htmlspecialchars($s); ?></option>
        <?php endforeach; ?>
      </select>
    </div>
    <div><button type="submit">Search</button></div>
  </form>

  <?php if ($errors): ?>
    <div class="errors"><?php foreach ($errors as $e) echo "<div>".htmlspecialchars($e)."</div>"; ?></div>
  <?php endif; ?>

  <?php if ($api_error): ?>
    <div class="apierr"><?php echo htmlspecialchars($api_error); ?></div>
  <?php endif; ?>

  <?php if (($zip !== '' || $type !== '') && empty($errors) && !$api_error): ?>
    <h2 style="margin-top:22px;"><?php echo count($results) ? "Results" : "No matches found"; ?></h2>

    <?php if ($results): ?>
      <table>
        <thead>
          <tr>
            <th style="width:110px;">NPI</th>
            <th>Name</th>
            <th>Specialty (Primary)</th>
            <th>Location</th>
            <th>Phone</th>
            <th>Type</th>
            <th>Gender</th>
            <th>Enumeration Date</th>
            <th>Last Updated</th>
            <th class="actions">Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($results as $row):
            $rowId = 'd_' . htmlspecialchars($row['npi']);
          ?>
            <tr>
              <td class="small"><?php echo htmlspecialchars($row['npi']); ?></td>
              <td><?php echo htmlspecialchars($row['name']); ?></td>
              <td class="small"><?php echo htmlspecialchars($row['tax']); ?></td>
              <td class="small addr">
                <?php
                  $a = $row['addr'];
                  $line = htmlspecialchars($a['line1']);
                  if (!empty($a['line2'])) { $line .= "<br>" . htmlspecialchars($a['line2']); }
                  $cityst = htmlspecialchars($a['city']).", ".htmlspecialchars($a['state'])." ".htmlspecialchars($a['zip']);
                  echo $line."<br>".$cityst;
                ?>
              </td>
              <td class="small"><?php echo htmlspecialchars($row['addr']['phone'] ?: '—'); ?></td>
              <td class="small"><?php echo htmlspecialchars($row['etype']); ?></td>
              <td class="small"><?php echo htmlspecialchars($row['gender']); ?></td>
              <td class="small"><?php echo htmlspecialchars($row['enum_date']); ?></td>
              <td class="small"><?php echo htmlspecialchars($row['last_updated']); ?></td>
              <td class="actions"><button type="button" onclick="toggleDetails('<?php echo $rowId; ?>')">Details</button></td>
            </tr>

            <!-- Details row -->
            <tr id="<?php echo $rowId; ?>" class="details-row">
              <td colspan="10">
                <div class="details">
                  <strong>Mailing Address</strong><br/>
                  <?php
                    $m = $row['mail'];
                    $mline = htmlspecialchars($m['line1']);
                    if (!empty($m['line2'])) { $mline .= "<br>" . htmlspecialchars($m['line2']); }
                    $mcityst = htmlspecialchars($m['city']).", ".htmlspecialchars($m['state'])." ".htmlspecialchars($m['zip']);
                    $mphone = $m['phone'] ? " • Phone: ".htmlspecialchars($m['phone']) : "";
                    $mfax   = $m['fax']   ? " • Fax: ".htmlspecialchars($m['fax']) : "";
                    echo $mline."<br>".$mcityst.$mphone.$mfax;
                  ?>
                  <br><br>

                  <strong>All Specialties (Taxonomies)</strong>
                  <?php if (!empty($row['taxonomies'])): ?>
                    <ul class="small">
                      <?php foreach ($row['taxonomies'] as $t): ?>
                        <li>
                          <?php
                            $parts = [];
                            if (!empty($t['desc']))           $parts[] = $t['desc'];
                            else {
                              if (!empty($t['classification'])) $parts[] = $t['classification'];
                              if (!empty($t['specialization'])) $parts[] = $t['specialization'];
                            }
                            if (!empty($t['code']))           $parts[] = "Code: ".$t['code'];
                            if (!empty($t['license']))        $parts[] = "License: ".$t['license'];
                            if (!empty($t['state']))          $parts[] = "State: ".$t['state'];
                            echo htmlspecialchars(implode(' • ', array_filter($parts)));
                          ?>
                          <?php if (!empty($t['primary'])): ?><span class="badge">Primary</span><?php endif; ?>
                        </li>
                      <?php endforeach; ?>
                    </ul>
                  <?php else: ?>
                    <div class="small muted">No taxonomy details.</div>
                  <?php endif; ?>

                  <strong>Identifiers</strong>
                  <?php if (!empty($row['identifiers'])): ?>
                    <ul class="small">
                      <?php foreach ($row['identifiers'] as $id): ?>
                        <li>
                          <?php
                            $iparts = [];
                            if (!empty($id['desc']))       $iparts[] = $id['desc'];
                            if (!empty($id['identifier'])) $iparts[] = "ID: ".$id['identifier'];
                            if (!empty($id['issuer']))     $iparts[] = "Issuer: ".$id['issuer'];
                            if (!empty($id['state']))      $iparts[] = "State: ".$id['state'];
                            echo htmlspecialchars(implode(' • ', array_filter($iparts)));
                          ?>
                        </li>
                      <?php endforeach; ?>
                    </ul>
                  <?php else: ?>
                    <div class="small muted">No identifiers listed.</div>
                  <?php endif; ?>
                </div>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    <?php endif; ?>

    <div class="muted" style="margin-top:12px;">Data source: CMS NPI Registry Read API (v2.1). No API key required.</div>
  <?php endif; ?>
</body>
</html>
