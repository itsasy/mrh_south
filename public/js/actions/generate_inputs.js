const number = document.querySelector('#study_parameter');
const objetive = document.querySelector('.inputs_container .row');

const inputs = (valor) =>
    `<div class="form-group col-lg-2 col-md-3 col-xs-12 col-12 mr-4">
        <input 
        type="text" 
        name="nom_muestra[${valor}]" 
        id="muestras_${valor}" 
        class="form-control mt-1 muestras_${valor}"
        placeholder="Atributo ${valor}"  
        required>
    </div>`;

const generate = (container, repeat) => {
    container.innerHTML = '';
    for (var i = 1; i <= repeat; i++) {
        container.innerHTML += inputs(i);
    }
}

number.addEventListener('change', () => {
    generate(objetive, number.value)
})

number.addEventListener('keyup', () => {
    generate(objetive, number.value)
})
