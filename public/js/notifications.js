function showNotificationOverlay() {
    document.getElementById('notification-overlay').style.display = 'flex';
}

// Funkcia na skrytie overlay s notifikáciami
function hideNotificationOverlay() {
    document.getElementById('notification-overlay').style.display = 'none';
}

// Event listener pre kliknutie na button
document.getElementById('notification-button').addEventListener('click', function () {
    showNotificationOverlay();
});

// Event listener pre kliknutie mimo overlay
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
        },
        error: function(error) {
            console.error('Chyba pri kontrole notifikácií:', error);
        }
    });
}

$(window).on('popstate', function() {
    checkForNotifications();
});

//prevzate z internetu
setInterval(checkForNotifications, 100);
