const wrapper = document.getElementById('events-row');

var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
    return new bootstrap.Tooltip(tooltipTriggerEl)
})

wrapper?.addEventListener('click', (event) => {
    const isButton = event.target.nodeName === 'BUTTON' || event.target.nodeName === 'svg';
    if (!isButton) {
        return;
    }
    const eventID = event.target.id.split('-')[2]

    let content = document.getElementById(`url-${eventID}`).value
    const toolTipEL = document.getElementById(`copy-btn-${eventID}`);
    const tooltip = tooltipList.find(element => element._element.id.split('-')[2] === eventID);
    navigator.clipboard.writeText(content).then((res) => {
        function restoreTitle(e) {
            tooltip.hide();
            toolTipEL.setAttribute('data-bs-original-title', 'Copy url!');
            toolTipEL.removeEventListener('mouseleave', restoreTitle);
        }
        toolTipEL.setAttribute('data-bs-original-title', 'Copied!');
        tooltip.update();
        tooltip.show();
        toolTipEL.addEventListener('mouseleave', restoreTitle);

    })

})

