// const showMenu = (toggleId,sidebarId,linkID)=>{
//     const toggle = document.getElementById(toggleId),
//     navbar = document.getElementById(sidebarId)
//     links = document.getElementsByClassName(linkID)
//     var main  = document.querySelector(".all");
//     console.log(main);

//     if(toggle && navbar){
//         toggle.addEventListener('click',()=>{
//             navbar.classList.toggle('show')
//             main.classList.toggle('showContainer');
//             toggle.classList.toggle('rotate')
//             Array.from(links).forEach(link => {
//                 link.classList.toggle('edit');
//             });
//         })
//     }
// }
// showMenu('sidebar_toggle_icon','sidebar','sidebar_link')

// const showsubMenu = (IconId,submenuID,subId)=>{
//     const icon = document.getElementById(IconId),
//     submenu = document.getElementById(submenuID)
//     sub = document.getElementById(subId)
//     if(submenu && sub){
//         submenu.addEventListener('click',()=>{
//             sub.classList.toggle('showsub')
//             icon.classList.toggle('rotate')
            
//         })
//     }   
// }
// showsubMenu('sidebar_left_icon','submenu1','sublist1')

// const showsubMenu2 = (IconId,submenuID,subId)=>{
//     const icon2 = document.getElementById(IconId),
//     submenu2 = document.getElementById(submenuID)
//     sub2 = document.getElementById(subId)
//     if(submenu2 && sub2){
//         submenu2.addEventListener('click',()=>{
//             sub2.classList.toggle('showsub2')
//             icon2.classList.toggle('rotate')
//         })
//     }    
// }
// showsubMenu2('sidebar_left_icon2','submenu2','sublist2')

// // đăng xuất
// function LogoutAmin(){    
//     $.post("http://localhost/WebBanHangMoHinhMVC/AjaxLogin/Logout",{},function(data){
//         // alert("Dang xuat thanh cong")
//         // window.location.assign("http://localhost/WebBanHangMoHinhMVC/DangNhap/dangNhap");
//         swal({
//             title: "Đăng xuất thành công!",
//             text: "Nhấn vào nút để tiếp tục!",
//             icon: "success",
//         }).then(function () {
//             window.location("http://localhost/WebBanHangMoHinhMVC/DangNhap/dangNhap");
//         })
//     });

// };