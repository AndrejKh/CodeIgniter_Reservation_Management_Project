const wrapper = document.getElementById('events-row');

var tooltipTriggerList = [].slice.call(
  document.querySelectorAll('[data-bs-toggle="tooltip"]')
);
var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
  return new bootstrap.Tooltip(tooltipTriggerEl);
});

wrapper?.addEventListener('click', (event) => {
  const isButton =
    (event.target.nodeName === 'BUTTON' || event.target.nodeName === 'I') &&
    event.target.id !== 'dropdownMenuButton1';
  if (!isButton) {
    return;
  }
  const index = window.innerWidth > 576 ? 2 : 3;
  const eventID = event.target.id.split('-')[index];

  const buttonId =
    window.innerWidth > 576
      ? `copy-btn-${eventID}`
      : `copy-btn-mobile-${eventID}`;

  const tooltip = tooltipList.find(
    (element) => element._element.id.split('-')[index] === eventID
  );
  const toolTipEL = tooltip._element;

  function restoreTitle(e) {
    tooltip.hide();

    toolTipEL.setAttribute('data-bs-original-title', 'Copy url!');
    toolTipEL.removeEventListener('mouseleave', restoreTitle);
  }
  const showCopiedAlert = () => {
    if (window.innerWidth > 576) {
      toolTipEL.setAttribute('data-bs-original-title', 'Copied!');
      tooltip.update();
      tooltip.show();
      toolTipEL.addEventListener('mouseleave', restoreTitle);
    }
  };
  let content = document.querySelector(`#url-${eventID}`)?.value;
  navigator.clipboard.writeText(content).then((res) => {
    restoreTitle();
    showCopiedAlert();
  });
});
