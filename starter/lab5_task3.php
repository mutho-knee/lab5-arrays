<?php
/**
 * ICS 2371 — Lab 5: Arrays and Array Operations
 * Task 3: Bubble Sort & Linear Search [7 marks]
 *
 * IMPORTANT: You must write pseudocode AND a flowchart for BOTH
 * the bubble sort and linear search in your PDF report BEFORE
 * writing any code below.
 *
 * @author     [Michelle Muthoni Mwangi]
 * @student    [ENE212-0064/2023]
 * @lab        Lab 5 of 14
 * @unit       ICS 2371
 * @date       [23/04/2026]
 */

// Working dataset
$data = [64, 34, 25, 12, 22, 11, 90, 47, 55, 38];

// ══════════════════════════════════════════════════════════════
// EXERCISE A — Manual Bubble Sort (ascending)
// ══════════════════════════════════════════════════════════════
// Implement bubble sort WITHOUT using PHP's sort() function.
// Use nested for loops.
// Rules:
//   - Outer loop: runs (n-1) times
//   - Inner loop: compares adjacent pairs
//   - Swap if left > right using a $temp variable
//   - Print the array after EACH full outer pass to show progress
//
// Expected: [11, 12, 22, 25, 34, 38, 47, 55, 64, 90]
//
// After sorting, answer in a comment:
// Q: How many comparisons does bubble sort make for n=10 elements
//    in the worst case? Show your working.

// TODO: Exercise A — Bubble Sort — your code here
echo "Exercise A — Bubble Sort (ascending)\n";
echo "Initial data: \n"; print_r($data);
$n = count($data);
// Standard bubble sort: outer runs (n-1) times, inner compares adjacent pairs
for ($pass = 1; $pass <= $n - 1; $pass++) {
    for ($i = 0; $i < $n - $pass; $i++) {
        if ($data[$i] > $data[$i + 1]) {
            // swap using $temp
            $temp = $data[$i];
            $data[$i] = $data[$i + 1];
            $data[$i + 1] = $temp;
        }
    }
    echo "After pass {$pass}: "; print_r($data);
}
// Expected final result: [11, 12, 22, 25, 34, 38, 47, 55, 64, 90]
echo "Final sorted (standard bubble): \n"; print_r($data);

// Answer (comment): how many comparisons in worst case for n=10?
// Worst-case number of comparisons = n*(n-1)/2 = 10*9/2 = 45 comparisons.


// ══════════════════════════════════════════════════════════════
// EXERCISE B — Optimised Bubble Sort
// ══════════════════════════════════════════════════════════════
// Modify your bubble sort to use a $swapped flag.
// If no swaps occur in a full pass, the array is already sorted
// — break early. This is the optimised version.
// Test it on an already-sorted array and show it exits early.

// TODO: Exercise B — Optimised Bubble Sort — your code here
echo "\nExercise B — Optimised Bubble Sort\n";
function optimizedBubbleSort(array $arr): array {
    $n = count($arr);
    for ($pass = 1; $pass <= $n - 1; $pass++) {
        $swapped = false;
        for ($i = 0; $i < $n - $pass; $i++) {
            if ($arr[$i] > $arr[$i + 1]) {
                $temp = $arr[$i];
                $arr[$i] = $arr[$i + 1];
                $arr[$i + 1] = $temp;
                $swapped = true;
            }
        }
        echo "After pass {$pass}: "; print_r($arr);
        if (! $swapped) {
            echo "No swaps on pass {$pass} — array is sorted, breaking early.\n";
            break;
        }
    }
    return $arr;
}

// Test optimized on an already-sorted array to show early exit
$sortedTest = [11,12,22,25,34,38,47,55,64,90];
echo "\nTesting optimizedBubbleSort on an already-sorted array:\n"; print_r($sortedTest);
$sortedResult = optimizedBubbleSort($sortedTest);
echo "Result: \n"; print_r($sortedResult);


// ══════════════════════════════════════════════════════════════
// EXERCISE C — Linear Search
// ══════════════════════════════════════════════════════════════
// Implement a linear search function:
//   linearSearch(array $arr, $target): int|false
// Returns the INDEX of $target if found, false if not found.
// Do NOT use in_array() or array_search() — implement manually.
//
// Test with:
//   linearSearch($data, 22)  → should return index 4 (original array)
//   linearSearch($data, 99)  → should return false
//
// Print clearly: "Found 22 at index 4" or "99 not found"

// TODO: Exercise C — Linear Search — your code here
echo "\nExercise C — Linear Search\n";
function linearSearch(array $arr, $target) {
    for ($i = 0; $i < count($arr); $i++) {
        if ($arr[$i] === $target) {
            return $i; // found index
        }
    }
    return false; // not found
}

// Tests
$idx22 = linearSearch([64,34,25,12,22,11,90,47,55,38], 22);
if ($idx22 !== false) {
    echo "linearSearch(..., 22) returned index: {$idx22}\n";
} else {
    echo "22 not found\n";
}

$idx99 = linearSearch([64,34,25,12,22,11,90,47,55,38], 99);
if ($idx99 !== false) {
    echo "linearSearch(..., 99) returned index: {$idx99}\n";
} else {
    echo "99 not found\n";
}

// ══════════════════════════════════════════════════════════════
// EXERCISE D — Sort then Search
// ══════════════════════════════════════════════════════════════
// 1. Sort $data using your bubble sort from Exercise A
// 2. Run linearSearch() on the sorted array for value 47
// 3. In a comment, explain: after sorting, has the index of 47
//    changed compared to the original array? Why does this matter?

// TODO: Exercise D — your code here
echo "\nExercise D — Sort then Search\n";
$unsorted = [64, 34, 25, 12, 22, 11, 90, 47, 55, 38];
$sorted = optimizedBubbleSort($unsorted); // reuse optimized sort
echo "Sorted data: \n"; print_r($sorted);
$idx47 = linearSearch($sorted, 47);
if ($idx47 !== false) {
    echo "Index of 47 after sorting: {$idx47}\n";
} else {
    echo "47 not found after sorting\n";
}

// Comment: has the index of 47 changed after sorting? Why does this matter?
// Yes — the index of 47 changes after sorting because sorting rearranges elements into ascending order.
// This matters because indexes represent positions in the array, and any code that relies on the original positions
// must account for the fact that sorting will change those positions. If you need to preserve original indices,
// store them alongside values (e.g., as pairs) before sorting.

?>
