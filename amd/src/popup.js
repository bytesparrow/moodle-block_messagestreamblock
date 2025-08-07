export const init = () => {
    const popup = document.getElementById('messagestream-popup');
    const header = document.getElementById('popupHeader');
    const openBtn = document.getElementById('openPopup');
    const closeBtn = document.getElementById('closePopup');

    openBtn.addEventListener('click', () => {
        popup.classList.remove('hidden');

        // Berechne initiale absolute Position
        const width = popup.offsetWidth;
        const height = popup.offsetHeight;
        const winWidth = window.innerWidth;
        const winHeight = window.innerHeight;

        popup.style.left = `${(winWidth - width) / 2}px`;
        popup.style.top = `${(winHeight - height) / 2}px`;

        // Entferne transform – sonst gibt’s Sprünge beim Drag
        popup.style.transform = 'none';
    });


    closeBtn.addEventListener('click', () => {
        popup.classList.add('hidden');
    });

    let isDragging = false;
    let offsetX = 0;
    let offsetY = 0;

    header.addEventListener('mousedown', (e) => {
        isDragging = true;

        const rect = popup.getBoundingClientRect();

        // Position des Klicks relativ zur linken oberen Ecke des Dialogs
        offsetX = e.clientX - rect.left;
        offsetY = e.clientY - rect.top;

        // Vor dem Ziehen: transform entfernen, damit absolute Positionen greifen
        popup.style.left = rect.left + 'px';
        popup.style.top = rect.top + 'px';
        popup.style.transform = 'none';

        e.preventDefault(); // Verhindert Textauswahl o.Ä.
    });

    document.addEventListener('mousemove', (e) => {
        if (!isDragging || offsetX === undefined || offsetY === undefined) {
            return;
        }

        const newLeft = e.clientX - offsetX;
        const newTop = Math.max(e.clientY - offsetY, 50); // nicht unter Moodle-Menü

        popup.style.left = `${newLeft}px`;
        popup.style.top = `${newTop}px`;
    });

    document.addEventListener('mouseup', () => {
        isDragging = false;
    });
};
