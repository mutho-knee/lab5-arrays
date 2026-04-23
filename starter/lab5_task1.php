<?php
/**
 * ICS 2371 — Lab 5: Arrays and Array Operations
 * Task 1: Array Declaration, Initialisation & Traversal [6 marks]
 *
 * @author     [Michelle Muthoni Mwangi]
 * @student    [ENE212-0064/2023]
 * @lab        Lab 5 of 14
 * @unit       ICS 2371
 * @date       [23/04/2026]
 */

// ══════════════════════════════════════════════════════════════
// EXERCISE A — Indexed Array: Sensor Readings
// ══════════════════════════════════════════════════════════════
// Declare an indexed array $temperatures with 6 float values:
// 36.5, 37.1, 38.4, 36.9, 39.2, 37.8
// 1. Print the array using print_r()
// 2. Access and print the 3rd and 5th elements by index
// 3. Traverse using a for loop — print each value with its index:
//    "Reading [0]: 36.5°C"
// 4. Traverse using foreach — same output format

// TODO: Exercise A — your code here
$temperatures = [36.5, 37.1, 38.4, 36.9, 39.2, 37.8];

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Lab 5 - Task 1</title>
</head>
<body>
    <h1>Exercise A — Indexed Array: Sensor Readings</h1>
    <pre>
<?php
// Print the array using print_r()
echo "Array with print_r():\n";
print_r($temperatures);
echo "\n";

// Access 3rd and 5th elements by index (0-based indexing)
$third = $temperatures[2];
$fifth = $temperatures[4];
echo "3rd element (index 2): {$third}°C\n";
echo "5th element (index 4): {$fifth}°C\n\n";

// Traverse with for loop
echo "Traversing with for loop:\n";
for ($i = 0; $i < count($temperatures); $i++) {
    echo "Reading [{$i}]: {$temperatures[$i]}°C\n";
}

echo "\n";

// Traverse with foreach loop
echo "Traversing with foreach loop:\n";
foreach ($temperatures as $index => $temp) {
    echo "Reading [{$index}]: {$temp}°C\n";
}

// ══════════════════════════════════════════════════════════════
// EXERCISE B — Associative Array: Student Record
// ══════════════════════════════════════════════════════════════
// Declare an associative array $student with keys:
// "name", "reg_number", "course", "year", "gpa"
// Use your own details as values.
// 1. Print the full array with print_r()
// 2. Access and print name and gpa individually
// 3. Traverse with foreach (key => value) and print:
//    "name: Jane Wanjiku"
//    "reg_number: SCT212-0001/2024"  etc.

// TODO: Exercise B — your code here
$student = [
    'name' => 'Michelle Mwangi',
    'reg_number' => 'ENE212-0064/2023',
    'course' => 'ECE',
    'year' => 3,
    'gpa' => 3.8
];

echo "\n\nExercise B — Associative Array: Student Record\n";
echo "Student with print_r():\n";
print_r($student);
echo "\nTraversing student array:\n";
foreach ($student as $key => $value) {
    echo "{$key}: {$value}\n";
}

// ══════════════════════════════════════════════════════════════
// EXERCISE C — Array Modification
// ══════════════════════════════════════════════════════════════
// Start with: $fruits = ["mango", "banana", "avocado"];
// 1. Add "pawpaw" using array_push()
// 2. Add "guava" using the [] syntax
// 3. Print the array after each addition
// 4. Remove the last element using array_pop() — print result
// 5. Remove "banana" using unset() — print result
// 6. Print count() before and after each modification

// TODO: Exercise C — your code here
$fruits = ["mango", "banana", "avocado"];
echo "\n\nExercise C — Array Modification\n";
echo "Initial fruits (count: " . count($fruits) . "):\n";
print_r($fruits);

echo "\nAdd 'pawpaw' using array_push()\n";
array_push($fruits, "pawpaw");
echo "After array_push (count: " . count($fruits) . "):\n";
print_r($fruits);

echo "\nAdd 'guava' using [] syntax\n";
$fruits[] = "guava";
echo "After [] (count: " . count($fruits) . "):\n";
print_r($fruits);

echo "\nRemove last element with array_pop()\n";
$removed = array_pop($fruits);
echo "Popped element: {$removed}\n";
echo "After array_pop (count: " . count($fruits) . "):\n";
print_r($fruits);

echo "\nRemove 'banana' with unset()\n";
// find index of 'banana' and unset it
$bananaIndex = array_search('banana', $fruits, true);
if ($bananaIndex !== false) {
    unset($fruits[$bananaIndex]);
    echo "Removed 'banana' at index {$bananaIndex}\n";
} else {
    echo "'banana' not found\n";
}
echo "After unset (count: " . count($fruits) . "):\n";
print_r($fruits);

// ══════════════════════════════════════════════════════════════
// EXERCISE D — Nested Array
// ══════════════════════════════════════════════════════════════
// Declare a nested associative array $lab_results with
// at least 3 students, each having: name, cat_total, exam
// Traverse with nested foreach and print a formatted
// result for each student showing name and total marks.

// TODO: Exercise D — your code here
$lab_results = [
    ['name' => 'Alice', 'cat_total' => 28, 'exam' => 62],
    ['name' => 'Bob',   'cat_total' => 25, 'exam' => 58],
    ['name' => 'Carol', 'cat_total' => 30, 'exam' => 65]
];

echo "\n\nExercise D — Nested Array: Lab Results\n";
foreach ($lab_results as $studentResult) {
    $total = 0;
    foreach ($studentResult as $key => $value) {
        if ($key === 'name') {
            echo "Student: {$value}\n";
        } else {
            echo ucfirst($key) . ": {$value}\n";
            $total += is_numeric($value) ? $value : 0;
        }
    }
    echo "Total score: {$total}\n\n";
}
?>
