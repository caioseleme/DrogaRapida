function initMap() {
    // Localização inicial do mapa
    const center = { lat: -23.5505, lng: -46.6333 }; // Coordenadas de São Paulo, SP (substitua por sua localização desejada)

    // Criação do mapa
    const map = new google.maps.Map(document.getElementById('map'), {
        center: center,
        zoom: 14
    });

    // Dados das farmácias (exemplo)
    const pharmacies = [
        { lat: -23.5520, lng: -46.6340, name: 'Farmácia A' },
        { lat: -23.5490, lng: -46.6350, name: 'Farmácia B' },
        { lat: -23.5510, lng: -46.6310, name: 'Farmácia C' }
    ];

    // Adiciona um marcador para cada farmácia
    pharmacies.forEach(pharmacy => {
        new google.maps.Marker({
            position: { lat: pharmacy.lat, lng: pharmacy.lng },
            map: map,
            title: pharmacy.name
        });
    });
}
