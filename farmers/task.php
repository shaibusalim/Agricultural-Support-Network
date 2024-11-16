<?php
include "../connection.php"; // Connect to the database

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['taskName'], $_POST['taskDescription'], $_POST['taskDate'])) {
        $taskName = $_POST['taskName'];
        $taskDescription = $_POST['taskDescription'];
        $taskDate = $_POST['taskDate'];

        $sql = "INSERT INTO tasks (task_name, description, task_date) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sss", $taskName, $taskDescription, $taskDate);

        if ($stmt->execute()) {
            echo "Task added successfully";
        } else {
            echo "Error adding task: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Missing fields";
    }
    $conn->close();
} else {
    echo "Invalid request";
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>Task Scheduling Calendar</title>
 <style>
    .container {
      display: grid;
      grid-template-columns: repeat(7, 1fr);
      gap: 1px;
      background-color: #f8f9fa;
    }

    .cell {
      padding: 5px;
      text-align: center;
      cursor: pointer;
    }

    .today {
      background-color: #007bff;
      color: white;
    }

    .selected {
      background-color: #dc3545;
      color: white;
    }

    .other-month {
      color: #6c757d;
    }

    .modal {
      display: none;
      position: fixed;
      z-index: 1;
      left: 0;
      top: 0;
      width: 100%;
      height: 100%;
      overflow: auto;
      background-color: rgba(0, 0, 0, 0.4);
    }

    .modal-content {
      background-color: #fefefe;
      margin: 15% auto;
      padding: 20px;
      border: 1px solid #888;
      width: 80%;
    }

    .close {
      color: #aaaaaa;
      float: right;
      font-size: 28px;
      font-weight: bold;
    }

    .close:hover,
    .close:focus {
      color: #000;
      text-decoration: none;
      cursor: pointer;
    }
 </style>
</head>
<body>
 <div class="container">
    <!-- Generate the calendar grid -->
 </div>
 <button onclick="openModal()">Schedule Task</button>

 <div id="myModal" class="modal">
 <div class="modal-content">
    <span class="close">&times;</span>
    <form id="taskForm" action="task.php" method="post">
        <label for="taskName">Task Name:</label><br>
        <input type="text" id="taskName" name="taskName" required><br>
        <label for="taskDescription">Task Description:</label><br>
        <textarea id="taskDescription" name="taskDescription" required></textarea><br>
        <input type="date" id="taskDate" name="taskDate" required><br>
        <input type="submit" value="Schedule Task">
      </form>
      
 </div>
</div>

 <script>
    const currentDate = new Date();
    const currentMonth = currentDate.getMonth();
    const currentYear = currentDate.getFullYear();
    const daysInMonth = new Date(currentYear, currentMonth + 1, 0).getDate();
    const firstDayOfMonth = new Date(currentYear, currentMonth, 1).getDay();

    let selectedDate;

    const container = document.querySelector('.container');
    const taskForm = document.getElementById('taskForm');
    const modal = document.getElementById('myModal');
    const span = document.getElementsByClassName('close')[0];

    function openModal() {
      modal.style.display = 'block';
    }

    span.onclick = function() {
      modal.style.display = 'none';
    }

    window.onclick = function(event) {
      if (event.target == modal) {
        modal.style.display = 'none';
      }
    }

    taskForm.onsubmit = function(event) {
      event.preventDefault();
      if (!selectedDate) {
        alert('Please select a date');
        return;
      }
      alert(`Task "${taskForm.taskName.value}" scheduled for ${selectedDate}`);
    }

    // Generate the calendar grid
    for (let i = 0; i < firstDayOfMonth; i++) {
      const cell = document.createElement('div');
      cell.classList.add('cell');
      cell.classList.add('other-month');
      container.appendChild(cell);
    }

    for (let i = 1; i <= daysInMonth; i++) {
      const cell = document.createElement('div');
      cell.classList.add('cell');
      cell.textContent = i;
      if (i === currentDate.getDate() && currentYear === currentDate.getFullYear() && currentMonth === currentDate.getMonth()) {
        cell.classList.add('today');
        selectedDate = new Date(currentYear, currentMonth, i).toISOString().slice(0, 10);
      }
      cell.addEventListener('click', function() {
        selectedDate = new Date(currentYear, currentMonth, i).toISOString().slice(0, 10);
        for (const cell of container.children) {
          cell.classList.remove('selected');
        }
        this.classList.add('selected');
      });
      container.appendChild(cell);
    }

    // Task data (mocked tasks for demonstration)
  const tasks = [
    { date: '2023-12-15', name: 'Task 1', description: 'Description for Task 1' },
    { date: '2023-12-20', name: 'Task 2', description: 'Description for Task 2' },
    // Add more tasks as needed
  ];

  // Function to display scheduled tasks on the calendar
  function displayTasks() {
    tasks.forEach(task => {
      const taskDate = new Date(task.date);
      const dayCell = document.querySelector(`.container .cell:nth-child(${taskDate.getDate() + firstDayOfMonth})`);
      if (dayCell) {
        const taskIndicator = document.createElement('div');
        taskIndicator.classList.add('task-indicator');
        dayCell.appendChild(taskIndicator);

        // Add click event to display task details
        taskIndicator.addEventListener('click', () => {
          alert(`Task: ${task.name}\nDate: ${task.date}\nDescription: ${task.description}`);
        });
      }
    });
  }

  // Call the function to display tasks
  displayTasks();
 </script>
</body>
</html>