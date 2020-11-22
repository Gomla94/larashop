function deleteModal() {
    $('#deleteModal').modal('show');
    const deleteBtn = document.querySelector('#deleteBtn');
    const deleteForm = deleteBtn.parentElement;
    deleteBtn.addEventListener('click', event => {
        event.preventDefault();
        deleteForm.submit();
    })
}