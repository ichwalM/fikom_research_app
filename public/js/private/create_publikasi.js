document.addEventListener('DOMContentLoaded', function() {
    const checkbox = document.getElementById('keterlibatan_mahasiswa');
    const inputContainer = document.getElementById('input_mahasiswa');
    const inputField = document.getElementById('nama_mahasiswa');

    toggleInputVisibility();

    checkbox.addEventListener('change', toggleInputVisibility);

    function toggleInputVisibility() {
        if (checkbox.checked) {
            inputContainer.classList.remove('hidden');
            inputField.required = true;   // aktifkan required
        } else {
            inputContainer.classList.add('hidden');
            inputField.value = '';         // kosongkan field
            inputField.required = false;   // nonaktifkan required
        }
    }
});