// will be replaced by backend later (user data will come from server-side auth)
document.addEventListener('DOMContentLoaded', () => {
    let user = JSON.parse(localStorage.getItem('user') || '{}');
    if (!user || !user.email) {
        window.location.href = 'auth/login.php';
        return;
    }


    if (!document.getElementById('edit-details-modal')) {
        const modal = document.createElement('div');
        modal.id = 'edit-details-modal';
        modal.className = 'modal-overlay hidden';
        modal.innerHTML = `
            <div class="modal-content">
                <h3>Edit My Details</h3>
                <label>Name:<input type="text" class="edit-name"></label>
                <label>Birthdate:<input type="date" class="edit-birthdate"></label>
                <label>Preferred Gender:
                    <select class="edit-gender">
                        <option value="Any">Any</option>
                        <option value="Female">Female</option>
                        <option value="Male">Male</option>
                        <option value="Other">Other</option>
                    </select>
                </label>
                <div class="modal-actions">
                    <button class="save-details-btn">Save</button>
                    <button class="cancel-details-btn">Cancel</button>
                </div>
            </div>
        `;
        document.body.appendChild(modal);
    }

    const modal = document.getElementById('edit-details-modal');
    const openModalBtn = document.querySelector('.profile-info .edit-btn');
    const nameInput = modal.querySelector('.edit-name');
    const birthInput = modal.querySelector('.edit-birthdate');
    const genderInput = modal.querySelector('.edit-gender');
    const saveBtn = modal.querySelector('.save-details-btn');
    const cancelBtn = modal.querySelector('.cancel-details-btn');

    openModalBtn.addEventListener('click', () => {
        nameInput.value = user.name || '';
        birthInput.value = user.birthdate || '';
        genderInput.value = user.gender || 'Any';
        modal.classList.remove('hidden');
    });

    cancelBtn.addEventListener('click', () => {
        modal.classList.add('hidden');
    });

    modal.addEventListener('click', (e) => {
        if (e.target === modal) modal.classList.add('hidden');
    });

    saveBtn.addEventListener('click', () => {
        user.name = nameInput.value.trim();
        user.birthdate = birthInput.value;
        user.gender = genderInput.value;
        localStorage.setItem('user', JSON.stringify(user));
        document.querySelector('.profile-info div:nth-child(1)').innerHTML = `<b>NAME:</b> ${user.name}`;
        document.querySelector('.profile-info div:nth-child(2)').innerHTML = `<b>BIRTHDATE:</b> ${user.birthdate}`;
        document.querySelector('.profile-info div:nth-child(3)').innerHTML = `<b>PREFERRED GENDER:</b> ${user.gender}`;
        modal.classList.add('hidden');
    });
});
