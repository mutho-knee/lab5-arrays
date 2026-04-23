<?php
/**
 * ICS 2371 — Lab 5: Arrays and Array Operations
 * Task 2: Built-in Array Functions [6 marks]
 *
 * @author     [Michelle Muthoni Mwangi]
 * @student    [ENE212-0064/2023]
 * @lab        Lab 5 of 14
 * @unit       ICS 2371
 * @date       [23/04/2026]
 */

// Working dataset — use this array for ALL exercises below
$scores = [72, 45, 88, 91, 63, 77, 55, 88, 49, 95, 63, 70];

// ══════════════════════════════════════════════════════════════
// EXERCISE A — Counting & Summing
// ══════════════════════════════════════════════════════════════
// Use count() to print total number of scores
// Use array_sum() to print total marks
// Compute and print average (to 2 decimal places)

// TODO: Exercise A — your code here
echo "Exercise A — Counting & Summing\n";
echo "Scores: \n";
print_r($scores);

echo "Total number of scores (count): " . count($scores) . "\n";
echo "Total marks (array_sum): " . array_sum($scores) . "\n";
$average = array_sum($scores) / max(1, count($scores));
echo "Average (2 decimal places): " . number_format($average, 2) . "\n\n";


// ══════════════════════════════════════════════════════════════
// EXERCISE B — Sorting
// ══════════════════════════════════════════════════════════════
// 1. Sort $scores ascending using sort() — print result
// 2. Sort $scores descending using rsort() — print result
// 3. Sort $scores ascending again and use array_reverse()
//    to get descending — print result
// Note: explain in a comment why sort() modifies the original array

// TODO: Exercise B — your code here
echo "Exercise B — Sorting\n";
$copy = $scores; // keep original for demonstration

sort($copy); // sort() modifies the array in-place (it operates on the array given and does not return a new sorted array)
echo "Sorted ascending (sort): \n";
print_r($copy);

$copyDesc = $scores;
rsort($copyDesc); // rsort() sorts in-place descending
echo "Sorted descending (rsort): \n";
print_r($copyDesc);

// Sort ascending then use array_reverse()
$copy2 = $scores;
sort($copy2);
$reversed = array_reverse($copy2); // returns a new array, original $copy2 remains sorted ascending
echo "Sorted ascending then reversed with array_reverse(): \n";
print_r($reversed);

// ══════════════════════════════════════════════════════════════
// EXERCISE C — Searching
// ══════════════════════════════════════════════════════════════
// 1. Use in_array() to check if 88 exists — print true/false
// 2. Use in_array() to check if 100 exists — print true/false
// 3. Use array_search() to find the index of 91 — print it
// 4. Use array_search() on a value that doesn't exist —
//    show how to handle the false return value safely

// TODO: Exercise C — your code here
echo "\nExercise C — Searching\n";
$has88 = in_array(88, $scores);
echo "Is 88 in scores? " . ($has88 ? 'true' : 'false') . "\n";
$has100 = in_array(100, $scores);
echo "Is 100 in scores? " . ($has100 ? 'true' : 'false') . "\n";

$index91 = array_search(91, $scores);
if ($index91 === false) {
    echo "91 not found (array_search returned false)\n";
} else {
    echo "Index of 91 (array_search): {$index91}\n";
}

// show handling false safely
$result = array_search(999, $scores);
if ($result === false) {
    echo "999 not found (safe check using === false)\n";
} else {
    echo "Found 999 at index {$result}\n";
}

// ══════════════════════════════════════════════════════════════
// EXERCISE D — Transformation Functions
// ══════════════════════════════════════════════════════════════
// Use the original $scores array (re-declare if needed)
// 1. array_unique() — remove duplicates, print result
// 2. array_slice($scores, 2, 5) — print the slice and
//    explain what the parameters mean in a comment
// 3. implode(", ", $scores) — print as comma-separated string
// 4. array_reverse() — print reversed array

// TODO: Exercise D — your code here
echo "\nExercise D — Transformation\n";
$unique = array_values(array_unique($scores)); // array_unique preserves keys, array_values reindexes
echo "Unique scores (array_unique): \n";
print_r($unique);

// array_slice($scores, 2, 5) -> start at index 2 and take up to 5 elements
$slice = array_slice($scores, 2, 5);
echo "\nSlice (array_slice(\$scores, 2, 5)) - starts at index 2, length 5:\n";
print_r($slice);

echo "\nScores as string (implode):\n";
echo implode(", ", $scores) . "\n";

echo "\nScores reversed (array_reverse):\n";
print_r(array_reverse($scores));
?>
