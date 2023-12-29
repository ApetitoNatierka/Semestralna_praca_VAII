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
