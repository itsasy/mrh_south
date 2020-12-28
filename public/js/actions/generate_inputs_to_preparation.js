const number = document.querySelector('#number_of_atributes');
const objetive = document.querySelector('.inputs_container');

const inputs = (valor) =>
    `<div class="form-group col-6 mt-3">
        <label class="justify-content-start col-6" for="nombre_atributo_${valor}">Atributo ${valor}:</label>
        <input 
        type="text" 
        name="attribute[${valor}]" 
        id="nombre_atributo_${valor}" 
        class="form-control col-6 nombre_atributo_${valor}"
        placeholder=""  
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
