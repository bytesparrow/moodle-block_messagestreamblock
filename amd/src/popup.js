export const init = () => {
    const popup = document.getElementById('messagestream-popup');
    const header = document.getElementById('messagestream-popup-header');
    const openBtn = document.getElementById('messagestream-open-popup-button');
    const closeBtn = document.getElementById('messagestream-close-popup-button');

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

/**
 * js solution to safari bug. solved via css
 * moves the popup to different containers since safari has a  stupid bug
 * @param {bool} to_body  move to body or to the container

function movePopupAround(to_body=false)
{return;
    const popup = document.getElementById('messagestream-popup');
    const container = document.getElementById('messagestream-popup-container');
    const body = document.body;

    if(to_body)
    {
         body.appendChild(popup);
    }
    else
    {
         container.appendChild(popup);
    }

}
window.addEventListener('resize', function (){
     const isMobile = window.matchMedia('(max-width: 991.98px)').matches;
     return movePopupAround(!isMobile);
}, true);
 *  */
