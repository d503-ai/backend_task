# ASCII Table Generator

This PHP application generates an ASCII table from a given array. It follows the MVC (Model-View-Controller) pattern to maintain a separation of concerns and ensure code modularity. The application takes an input array, dynamically sorts the keys, and prints an ASCII table with the values of each element in the array.

## Features

- Generates an ASCII table from a given array.
- Supports an arbitrary number of rows and keys.
- Keys are sorted in alphabetical order.
- Handles missing keys in the data array gracefully.
- Right-aligns the values in each cell of the table.
- Provides smooth corners in the table layout.

## Usage

1. Ensure you have PHP installed on your system.
2. Clone the repository or copy the necessary files to your project directory.
3. Add your data to `main.php` file
4. Run the script with php via "php main.php"

## Design
The ASCII Table Generator application follows the Model-View-Controller (MVC) architectural pattern. Here's a brief description of each component:

### Model
- The `TableModel` class represents the Model component.
- It encapsulates the data and logic for generating the ASCII table from the input array.
- The Model is responsible for data handling and processing.

### View
- The View component is responsible for presenting the generated ASCII table.
- In this application, the View is represented by the `getTable()` method, which returns the ASCII table as a string.
- The View is decoupled from the Model and Controller, ensuring separation of concerns.

### Controller
- The Controller component manages the interaction between the Model and View.
- The `getTable()` method in the `TableModel` class acts as the entry point for generating the ASCII table.
- It coordinates the data retrieval from the Model and formats it for presentation in the View.

![Application Design](/assets/images/application_design.svg)
