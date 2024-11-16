function updateNotificationList(notifications) {
    const notificationList = document.getElementById('notification-list');

    // Clear existing notifications
    notificationList.innerHTML = '';

    // Add new notifications to the list
    notifications.forEach(notification => {
        const listItem = document.createElement('li');
        listItem.innerHTML = `
            <div class="media">
                <img class="d-flex align-self-center img-radius" src="${notification.avatar}" alt="User Avatar">
                <div class="media-body">
                    <h5 class="notification-user">${notification.user}</h5>
                    <p class="notification-msg">${notification.message}</p>
                    <span class="notification-time">${notification.time}</span>
                </div>
            </div>
        `;
        notificationList.appendChild(listItem);
    });
}

function checkUpcomingTasks() {
    const url = 'task_notification.php'; // Update the URL with the correct path
    fetch(url)
        .then(response => response.json())
        .then(tasks => {
            if (tasks.length > 0) {
                // Update the notification list with new tasks
                const notifications = tasks.map(task => ({
                    user: 'System', // You can customize the user information
                    message: `Upcoming Task: ${task.task_name} on ${task.task_date}`,
                    time: new Date().toLocaleString(),
                    avatar: '../libraries/assets/images/avatar-3.jpg' // Update with the correct path
                }));
                updateNotificationList(notifications);
            }
        })
        .catch(error => console.error('Error:', error));
}

// Periodically check for upcoming tasks (every 5 minutes in this example)
setInterval(checkUpcomingTasks, 5 * 60 * 1000); // Adjust the interval as needed
