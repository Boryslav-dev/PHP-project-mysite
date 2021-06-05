
const loadAllProduct = async() => {
    const response = await fetch('api/', {
        method: 'GET',
        headers: {
            'Content-Type': 'application/json'
        },
    });

    const jsonProduct = await response.json();

    console.log(jsonProduct);

    const card = '<div class="col">\n' +
        '          <div class="card shadow-sm">\n' +
        '            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" img="..." role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>\n' +
        '            <div class="card-body">\n' +
        '              <p id="card-name"></p>\n' +
        '              <p class="card-text" id="card-text"></p>\n' +
        '              <div class="d-flex justify-content-between align-items-center">\n' +
        '                <div class="btn-group">\n' +
        '                  <a class="btn btn-small" href="/product/">More</a>\n' +
        '                </div>\n' +
        '                <small class="text-muted">9 mins</small>\n' +
        '              </div>\n' +
        '            </div>\n' +
        '          </div>\n' +
        '        </div>';

    const productCard = document.getElementById('product-card');

    for(let i = 0; i < jsonProduct.length; i++) {
        productCard.insertAdjacentHTML('afterbegin',card);
        const name = document.getElementById('card-name');
        const text = document.getElementById('card-text');
        name.innerText = jsonProduct[i].name;
        text.innerText = jsonProduct[i].price;
    }
}

loadAllProduct();
