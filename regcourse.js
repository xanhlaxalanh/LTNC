// Lặp qua tất cả các button
document.querySelectorAll('button').forEach(button => {
    // Gán sự kiện click cho mỗi button
    button.addEventListener('click', () => {
        // Tìm phần tử alert gần nhất của button được click
        const alert = button.closest('.main').querySelector('.alert');
        // Thực hiện hiển thị alert
        showAlert(alert);
    });
});
// Hàm hiển thị alert
function showAlert(alert) {
    alert.style.right = '20px';
    let length = 40;
    let temp = alert.querySelector('.temp');
    const run = setInterval(() => {
        temp.style.height = length + 'px';
        length -= 5;
        if (length <= -10) {
            clearInterval(run);
            alert.style.right = '-500px';
        }
    }, 200);
}
