<div class="row">
    <div class="contact-map col-lg-6 col-12">
        <img src="{{asset('assets/images/home/frame3.png')}}" alt="Frame 3" class="map-frame"/>
        <img src="{{asset('assets/images/home/map.png')}}" alt="Map" class="map-image"/>
    </div>
    <div class="contact-form col-lg-6 col-12">
        <h5>
            Nếu quý khách có góp ý hoặc câu hỏi nào dành cho Đức Thanh, vui lòng gửi thông tin theo biểu mẫu:
        </h5>
        <form id="contact-form">
            <label>Họ và tên *</label>
            <input type="text" placeholder="Nhập họ và tên" name="name"/>
            <label>Số điện thoại *</label>
            <input type="text" placeholder="Nhập số điện thoại" name="phone"/>
            <label>Email *</label>
            <input type="text" placeholder="Nhập email" name="email"/>
            <label>Lời nhắn</label>
            <input type="text" placeholder="Nhập nội dung cần tư vấn" name="content"/>
            <div class="position-relative">
                <button type="submit" class="btn-save-contact">Gửi thông tin</button>
                <div class="loading"></div>
            </div>
        </form>
    </div>
</div>
