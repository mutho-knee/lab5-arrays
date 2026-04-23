<?php
/**
 * ICS 2371 — Lab 5: Arrays and Array Operations
 * Task 4: Engineering Analysis Using Arrays & Loops [6 marks]
 *
 * IMPORTANT: Pseudocode AND flowchart required in PDF report
 * before writing code.
 *
 * @author     [Michelle Muthoni Mwangi]
 * @student    [ENE212-0064/2023]
 * @lab        Lab 5 of 14
 * @unit       ICS 2371
 * @date       [23/04/2026]
 */

// ── Scenario: Bridge Load Sensor Analysis ────────────────────
// A bridge has 8 load sensors recording weight in tonnes.
// Analyse the readings to support a structural safety report.

$sensor_readings = [12.4, 8.7, 15.2, 19.8, 7.3, 14.6, 11.9, 16.3];
$sensor_labels   = ["S1", "S2", "S3", "S4", "S5", "S6", "S7", "S8"];
$max_safe_load   = 18.0; // tonnes — safety threshold

// ── STEP 1: Basic statistics ─────────────────────────────────
// Compute WITHOUT using array_sum(), max(), min() PHP functions
// Use loops only:
//   $mean   — average of all readings (2 decimal places)
//   $max    — highest reading + which sensor
//   $min    — lowest reading + which sensor
//   $total  — sum of all readings

// TODO: Step 1 — your code here
$n = count($sensor_readings);
$total = 0.0;
for ($i = 0; $i < $n; $i++) {
    $total += $sensor_readings[$i];
}
$mean = $total / max(1, $n);

// compute max and min with indices
$maxVal = $sensor_readings[0];
$minVal = $sensor_readings[0];
$maxIdx = 0;
$minIdx = 0;
for ($i = 1; $i < $n; $i++) {
    if ($sensor_readings[$i] > $maxVal) {
        $maxVal = $sensor_readings[$i];
        $maxIdx = $i;
    }
    if ($sensor_readings[$i] < $minVal) {
        $minVal = $sensor_readings[$i];
        $minIdx = $i;
    }
}

echo "Step 1 — Basic statistics\n";
echo "Total sensors: {$n}\n";
echo "Total load (sum): " . number_format($total, 2) . " t\n";
echo "Mean load: " . number_format($mean, 2) . " t\n";
echo "Max load: " . number_format($maxVal, 2) . " t (" . $sensor_labels[$maxIdx] . ")\n";
echo "Min load: " . number_format($minVal, 2) . " t (" . $sensor_labels[$minIdx] . ")\n\n";

// ── STEP 2: Above-average count ──────────────────────────────
// Count how many sensors recorded ABOVE the mean.
// Store their labels in an $above_avg array.
// Print: "X of 8 sensors recorded above-average load"
// Print the list of those sensor labels.

// TODO: Step 2 — your code here
$above_avg = [];
for ($i = 0; $i < $n; $i++) {
    if ($sensor_readings[$i] > $mean) {
        $above_avg[] = $sensor_labels[$i];
    }
}
$count_above = count($above_avg);
echo "Step 2 — Above-average count\n";
echo "{$count_above} of {$n} sensors recorded above-average load\n";
if ($count_above > 0) {
    echo "Sensors above average: " . implode(', ', $above_avg) . "\n\n";
} else {
    echo "No sensors above average\n\n";
}

// ── STEP 3: Safety threshold check ───────────────────────────
// Check each sensor against $max_safe_load (18.0 tonnes)
// If reading > $max_safe_load: flag as "UNSAFE"
// Otherwise: "SAFE"
// Print a formatted safety report table:
//   Sensor | Reading | Status
//   S1     | 12.4t   | SAFE
//   S4     | 19.8t   | UNSAFE  ← flag clearly

// TODO: Step 3 — your code here
echo "Step 3 — Safety threshold check (threshold: {$max_safe_load} t)\n";
echo "Sensor | Reading (t) | Status\n";
for ($i = 0; $i < $n; $i++) {
    $label = $sensor_labels[$i];
    $reading = $sensor_readings[$i];
    $status = ($reading > $max_safe_load) ? 'UNSAFE' : 'SAFE';
    echo sprintf("%4s | %8.2f | %s\n", $label, $reading, $status);
}

echo "\n";

// ── STEP 4: Sorted safety report ─────────────────────────────
// Sort the sensor readings in DESCENDING order using your
// bubble sort from Task 3 (copy the function here).
// Print the sorted readings alongside their original sensor labels.
// Note: you must track which label belongs to which reading
// as you sort — use a parallel array technique.

// TODO: Step 4 — your code here
function bubbleSortParallelDesc(array $values, array $labels): array {
    $n = count($values);
    for ($pass = 1; $pass <= $n - 1; $pass++) {
        for ($i = 0; $i < $n - $pass; $i++) {
            if ($values[$i] < $values[$i + 1]) { // for descending order
                // swap values
                $tmp = $values[$i];
                $values[$i] = $values[$i + 1];
                $values[$i + 1] = $tmp;
                // swap labels to keep them in parallel
                $tlabel = $labels[$i];
                $labels[$i] = $labels[$i + 1];
                $labels[$i + 1] = $tlabel;
            }
        }
    }
    return ['values' => $values, 'labels' => $labels];
}

$sorted = bubbleSortParallelDesc($sensor_readings, $sensor_labels);
$sortedValues = $sorted['values'];
$sortedLabels = $sorted['labels'];

echo "Step 4 — Sorted safety report (highest to lowest)\n";
echo "Sensor | Reading (t) | Status\n";
for ($i = 0; $i < $n; $i++) {
    $lab = $sortedLabels[$i];
    $val = $sortedValues[$i];
    $status = ($val > $max_safe_load) ? 'UNSAFE' : 'SAFE';
    echo sprintf("%4s | %8.2f | %s\n", $lab, $val, $status);
}

echo "\nNotes:\n";
echo "- To produce the required screenshots, run this script three times replacing the dataset with each test set (A,B,C) and capture the page output.\n";
echo "- Test A (default): expect S4 UNSAFE and mean around " . number_format($mean, 2) . " t.\n";

?>

// ── Required Test Data Sets — screenshot each ────────────────
// Set A (default above): expect S4 UNSAFE, mean ~13.28t
// Set B: [5.1, 5.2, 5.3, 5.4, 5.5, 5.6, 5.7, 5.8]
//        → all SAFE, mean 5.45t, above-avg = 4 sensors
// Set C: [20.1, 21.3, 19.9, 22.0, 18.5, 20.8, 19.2, 21.7]
//        → all UNSAFE (all exceed 18.0t)
