async function getCities(e) {
    console.log(1);
    let countryId = e.target.value;
    let resp = await fetch(`/pages/getcities.php?id=${countryId}`);
    if (resp.ok === true) {
        let options = await resp.text();
        let currentDiv = e.target.parentNode;
        let nextDiv = currentDiv.nextSibling.nextSibling;
        let citySelect = nextDiv.children[0];
        citySelect.innerHTML = options;
    }
}

async function getHotels(e) {
    console.log(e.target);
        let cityId = e.target.value;
    // console.log(countryId);
    let resp = await fetch(`/pages/gethotels.php?id=${cityId}`);
    if (resp.ok === true) {
        let options = await resp.text();
        let currentDiv = e.target.parentNode;
        let nextDiv = currentDiv.nextSibling.nextSibling;
        let hotelSelect = nextDiv.children[0];
        hotelSelect.innerHTML = options;
    }
}