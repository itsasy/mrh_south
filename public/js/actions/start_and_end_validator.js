const start = document.querySelector('#fecha_inicio_evaluacion');

const end = document.querySelector('#fecha_fin_evaluacion');

start.addEventListener('change', function () {
    if (start.value)
        end.min = start.value;
}, false);

end.addEventListener('change', function () {
    if (end.value)
        start.max = end.value;
}, false);
