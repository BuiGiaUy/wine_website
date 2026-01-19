@extends('content.layouts.app')

@section('title', 'Liên hệ - WINECELLAR.vn')

@section('content')
<main id="main">
     <!-- Hero Section -->
    <section class="uk-section-secondary uk-padding-large uk-text-center uk-light" style="background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);">
        <div class="uk-container">
            <h1 class="hero-title uk-margin-small-bottom">Liên Hệ Với Chúng Tôi</h1>
            <p class="uk-text-lead uk-margin-remove">Đội ngũ chuyên gia của chúng tôi luôn sẵn sàng hỗ trợ bạn</p>
        </div>
    </section>

    <!-- Contact Info Cards -->
    <section class="uk-section bg-light">
        <div class="uk-container">
            <div class="uk-grid-medium uk-child-width-1-3@m uk-grid-match" uk-grid>
                <div>
                    <div class="contact-info-card">
                        <div class="contact-icon">
                            <span uk-icon="icon: receiver; ratio: 1.5"></span>
                        </div>
                        <h4 class="contact-label">Hotline Tư Vấn</h4>
                        <p class="uk-text-muted uk-margin-remove">Giải đáp mọi thắc mắc ngay lập tức</p>
                        <p class="uk-margin-small-top">
                            <a href="tel:0946698008" class="uk-text-bold uk-link-reset text-primary">094 669 8008</a><br>
                            <a href="tel:0903530268" class="uk-text-bold uk-link-reset text-primary">0903 530 268</a>
                        </p>
                    </div>
                </div>
                <div>
                     <div class="contact-info-card">
                        <div class="contact-icon">
                            <span uk-icon="icon: mail; ratio: 1.5"></span>
                        </div>
                        <h4 class="contact-label">Email Hỗ Trợ</h4>
                        <p class="uk-text-muted uk-margin-remove">Gửi yêu cầu hợp tác hoặc báo giá</p>
                         <p class="uk-margin-small-top">
                            <a href="mailto:info@winecellar.vn" class="uk-text-bold uk-link-reset text-primary">info@winecellar.vn</a>
                        </p>
                    </div>
                </div>
                <div>
                     <div class="contact-info-card">
                        <div class="contact-icon">
                            <span uk-icon="icon: location; ratio: 1.5"></span>
                        </div>
                        <h4 class="contact-label">Hệ Thống Cửa Hàng</h4>
                        <p class="uk-text-muted uk-margin-remove">Trải nghiệm trực tiếp tại showroom</p>
                        <a href="https://winecellar.vn/lien-he/he-thong-cua-hang/" target="_blank" class="uk-button uk-button-text text-accent uk-margin-small-top">Xem danh sách</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Main Content Grid -->
    <section class="uk-section">
        <div class="uk-container">
            <div class="uk-grid-large uk-child-width-1-2@m" uk-grid>
                 <!-- FAQ & Info -->
                 <div>
                    <h3 class="section-title uk-text-left uk-margin-medium-bottom">Câu Hỏi Thường Gặp</h3>
                    <ul uk-accordion="collapsible: false">
                        <li class="uk-open">
                            <a class="uk-accordion-title uk-text-bold" href="#">Làm sao để chọn được chai vang phù hợp?</a>
                            <div class="uk-accordion-content">
                                <p>Bạn có thể trò chuyện trực tiếp với chúng tôi qua Facebook hoặc gọi HOTLINE để được chuyên gia tư vấn (Sommelier) hỗ trợ chọn dòng vang phù hợp nhất với khẩu vị và ngân sách.</p>
                            </div>
                        </li>
                        <li>
                            <a class="uk-accordion-title uk-text-bold" href="#">Thời gian giao hàng bao lâu?</a>
                            <div class="uk-accordion-content">
                                <p>Thông thường tại nội thành Hà Nội/TP.HCM thời gian giao hàng trong 24h. Đối với các tỉnh khác thời gian thường là 1-2 ngày làm việc.</p>
                            </div>
                        </li>
                        <li>
                            <a class="uk-accordion-title uk-text-bold" href="#">Có được nếm thử rượu trước khi mua?</a>
                            <div class="uk-accordion-content">
                                <p>Tại hệ thống cửa hàng WINECELLAR.vn, chúng tôi có chương trình nếm thử rượu vang tại Tasting Room. Ngoài ra, chúng tôi tặng MIỄN PHÍ đồ nguội (Jamon Iberico, Salami, Phomai...) khi thưởng thức tại cửa hàng.</p>
                            </div>
                        </li>
                    </ul>

                     <div class="uk-margin-large-top uk-padding uk-background-muted uk-border-rounded">
                        <h4 class="uk-card-title uk-margin-small-bottom">Đối Tác Doanh Nghiệp</h4>
                        <p>WINECELLAR.vn tự hào là nhà cung cấp uy tín cho hệ thống khách sạn 5 sao, nhà hàng cao cấp và đại lý trên toàn quốc.</p>
                        <a href="#" class="btn-outline-custom" style="color: var(--primary); border-color: var(--primary);">Đăng ký đối tác</a>
                    </div>
                 </div>

                 <!-- Contact Form -->
                 <div>
                    <div class="uk-card uk-card-default uk-card-body uk-box-shadow-large uk-border-rounded">
                        <h3 class="uk-card-title uk-text-center uk-margin-remove-bottom">Gửi Tin Nhắn</h3>
                        <p class="uk-text-center uk-text-muted uk-margin-bottom">Chúng tôi sẽ phản hồi trong vòng 24h</p>

                         <form action="/lien-he/#wpcf7-f6208-p5312-o3" method="post" class="uk-form-stacked">
                            <div class="uk-margin">
                                <label class="uk-form-label uk-text-bold" for="your-name">Họ và tên *</label>
                                <div class="uk-form-controls">
                                    <input class="uk-input uk-form-large" id="your-name" name="your-name" type="text" placeholder="Nguyễn Văn A" required>
                                </div>
                            </div>

                            <div class="uk-margin">
                                <label class="uk-form-label uk-text-bold" for="your-email">Email *</label>
                                <div class="uk-form-controls">
                                    <input class="uk-input uk-form-large" id="your-email" name="your-email" type="email" placeholder="email@example.com" required>
                                </div>
                            </div>

                            <div class="uk-margin">
                                <label class="uk-form-label uk-text-bold" for="your-phone">Số điện thoại *</label>
                                <div class="uk-form-controls">
                                    <input class="uk-input uk-form-large" id="your-phone" name="your-phone" type="tel" placeholder="090 123 4567" required>
                                </div>
                            </div>

                            <div class="uk-margin">
                                <label class="uk-form-label uk-text-bold" for="your-message">Nội dung</label>
                                <div class="uk-form-controls">
                                    <textarea class="uk-textarea" id="your-message" name="your-message" rows="5" placeholder="Bạn cần tư vấn về sản phẩm nào?"></textarea>
                                </div>
                            </div>

                            <div class="uk-margin uk-text-center">
                                <button class="btn-primary-custom uk-width-1-1 uk-flex-center" type="submit">Gửi Tin Nhắn</button>
                            </div>
                        </form>
                    </div>
                 </div>
            </div>
        </div>
    </section>
</main>
@endsection
