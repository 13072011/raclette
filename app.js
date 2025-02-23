document.getElementById('order-button').addEventListener('click', function() {
    // Simuler la commande
    const product = {
        name: 'Mini Machine à Raclette',
        price: 49.99,
    };

    // Afficher une alerte de confirmation
    alert('Commande passée avec succès!');

    // Envoyer une notification au producteur
    sendOrderNotification(product);
});

function sendOrderNotification(product) {
    // Simuler l'envoi d'une notification au producteur
    console.log('Notification envoyée au producteur pour le produit:', product);

    // Envoyer la notification au producteur via une requête HTTP
    fetch('https://13072011.github.io/api-product/notification', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({
            product: product.name,
            price: product.price,
            message: 'Une nouvelle commande a été passée.',
        }),
    })
    .then(response => response.json())
    .then(data => console.log('Notification envoyée:', data))
    .catch(error => console.error('Erreur:', error));
}
