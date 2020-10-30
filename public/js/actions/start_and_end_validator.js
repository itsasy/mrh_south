const start = document.querySelector('#evaluation_start_date');

const end = document.querySelector('#evaluation_end_date');

start.addEventListener('change', function () {
    if (start.value)
        end.min = start.value;
}, false);

end.addEventListener('change', function () {
    if (end.value)
        start.max = end.value;
}, false);
