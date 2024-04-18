<?php
// Define an associative array with key-value pairs
$student = [
    'name' => 'John Doe',
    'age' => 20,
    'grade' => 'A'
];

// Accessing values using keys
echo "Student Name: " . $student['name'] . "\n";
echo "Student Age: " . $student['age'] . "\n";
echo "Student Grade: " . $student['grade'] . "\n";

// Modifying values
$student['age'] = 21;
$student['grade'] = 'A-';

// Adding a new key-value pair
$student['city'] = 'New York';

// Display the updated array
echo "Updated Student Info:\n";
foreach ($student as $key => $value) {
    echo "$key: $value\n";
}

// Removing a key-value pair
unset($student['grade']);

// Display the updated array after removing a key-value pair
echo "Student Info after removing grade:\n";
foreach ($student as $key => $value) {
    echo "$key: $value\n";
}
?>