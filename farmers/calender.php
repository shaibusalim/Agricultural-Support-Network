<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Task Calendar</title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/5.10.0/main.min.css" rel="stylesheet">
</head>
<body>
  <div id="calendar"></div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/5.10.0/main.min.js"></script>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const calendarEl = document.getElementById('calendar');
      const calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        events: [
          // Replace with your events/tasks data
          {
            title: 'Planting',
            start: '2023-01-01'
          },
          {
            title: 'Watering',
            start: '2023-01-05',
            end: '2023-01-07'
          },
          // Add more events as needed
        ]
      });

      calendar.render();
    });
  </script>
</body>
</html>
