let usersTable = document.querySelector('.users-table');
let checkAll = document.getElementById('checkAll');
let checkboxes = usersTable.querySelectorAll('.simple-checkbox');

checkAll.addEventListener('change', function(e) {
    let isChecked = this.checked;

    for (let i = 0; i < checkboxes.length; i++) {
        checkboxes[i].checked = isChecked;
    }
});