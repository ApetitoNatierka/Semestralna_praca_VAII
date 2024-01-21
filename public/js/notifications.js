function showNotificationOverlay() {
    document.getElementById('notification-overlay').style.display = 'flex';
}

function hideNotificationOverlay() {
    document.getElementById('notification-overlay').style.display = 'none';
}

document.getElementById('notification-button').addEventListener('click', function () {
    showNotificationOverlay();
});

document.getElementById('notification-overlay').addEventListener('click', function (event) {
    if (event.target.id === 'notification-overlay') {
        hideNotificationOverlay();
    }
});

function checkForNotifications() {
    $.ajax({
        url: '/check_notifications',
        method: 'GET',
        success: function(response) {
            $('.notification-dialog').html(response);
            update_notification_button_color(response);
        },
        error: function(error) {
            console.error('Chyba pri kontrole notifikácií:', error);
        }
    });
}

function update_notification_button_color(notificationsHtml) {
    var hasNewNotifications = $('.new_notification').length > 0;

    var $notificationButton = $('#notification-button');

    $notificationButton.toggleClass('has-new-notifications', hasNewNotifications);
}

$(window).on('popstate', function() {
    checkForNotifications();
});

//prevzate z internetu
setInterval(checkForNotifications, 3000);
