<?php
class CheckoutController extends Controller
{
    private $OrderModel;
    public function __construct()
    {
        $this->OrderModel = $this->model('OrderModel');
    }

    public function index()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $user_id = $_SESSION['user_id'];
            $name = $_POST['name'];
            $phone = $_POST['phone'];
            $email = $_POST['email'];
            $address = $_POST['address'];
            $cart_code = rand(0, 999999);
            $note = $_POST['note'];
            $pay = $_POST['payment'];
            unset($_SESSION['errorPhone']);
            unset($_SESSION['errorAddress']);
            if(empty($phone)){
            $_SESSION['errorPhone'] = 'Please enter a phone number';
            }
            elseif(!is_numeric($phone)){
                $_SESSION['errorPhone'] = 'The phone number is not in the correct format';
            }
            if(empty($address)){
            $_SESSION['errorAddress'] = 'Please enter a street address';
            }
            else{
            unset($_SESSION['errorPhone']);
            unset($_SESSION['errorAddress']);
            $this->OrderModel->createOrder($name, $email, $address, $cart_code, $pay);
            foreach ($_SESSION['cart'] as $data) {
                $product_id = $data['id'];
                $ram = $data['ram']??'';
                $color = $data['color']??'';
                $qty = $data['qty'];
                $price = $data['price'];
                $this->OrderModel->createOrderDetail($cart_code, $user_id, $product_id, $price, $qty);
                $tbody[] = "<tr>
        <td style='color:#636363;border:1px solid #e5e5e5;vertical-align:middle;padding:12px;text-align:left;'
            align='left' class='hihi'>
             $data[name] <strong>$color $ram</strong> 
        </td>
        <td style='color:#636363;border:1px solid #e5e5e5;vertical-align:middle;padding:12px;text-align:left;'
            align='left' class='hihi'>
            $data[qty]
        </td>
        <td style='color:#636363;border:1px solid #e5e5e5;vertical-align:middle;padding:12px;text-align:left;'
            align='left' class='hihi'>
            <span><span>$</span>" . number_format($data['price']) . "</span>
        </td>
       </tr>";
            }
            $item = implode($tbody);
            $tieuDe = "Đơn hàng mới #$cart_code";
            $noiDung = "<div id=':n1' class='a3s aiL msg-7628188207803792935><u></u>
        <div marginwidth='0' marginheight='0' style='background-color:#f7f7f7;padding:0;text-align:center'
        bgcolor='#f7f7f7'>
        <table width='100%' id='m_-7628188207803792935outer_wrapper' style='background-color:#f7f7f7'
            bgcolor='#f7f7f7'>
            <tbody>
                <tr>
                    <td></td>
                    <td width='600'>
                        <div id='m_-7628188207803792935wrapper' dir='ltr'
                            style='margin:0 auto;padding:70px 0;width:100%;max-width:600px' width='100%'>
                            <table border='0' cellpadding='0' cellspacing='0' height='100%' width='100%'>
                            <tbody>
                            <tr>
                                <td align='center' valign='top'>
                                    <div id='m_-7628188207803792935template_header_image'>
                                    </div>
                                    <table border='0' cellpadding='0' cellspacing='0' width='100%'
                                        id='m_-7628188207803792935template_container'
                                        style='background-color:#fff;border:1px solid #dedede;border-radius:3px'
                                        bgcolor='#fff'>
                                        <tbody>
                                            <tr>
                                                <td align='center' valign='top'>
                    
                                                    <table border='0' cellpadding='0' cellspacing='0'
                                                        width='100%'
                                                        id='m_-7628188207803792935template_header'
                                                        style='background-color:#e84393;color:#fff;border-bottom:0;font-weight:bold;line-height:100%;vertical-align:middle;font-family:&quot;Helvetica Neue&quot;,Helvetica,Roboto,Arial,sans-serif;border-radius:3px 3px 0 0'
                                                        bgcolor='#ff9ea2'>
                                                        <tbody>
                                                            <tr>
                                                                <td id='m_-7628188207803792935header_wrapper'
                                                                    style='padding:36px 48px;display:block'>
                                                                    <h1 style='font-family:&quot;Helvetica Neue&quot;,Helvetica,Roboto,Arial,sans-serif;font-size:30px;font-weight:300;line-height:150%;margin:0;text-align:left;color:#fff;background-color:inherit'
                                                                        bgcolor='#e84393'>Đơn hàng mới: #$cart_code 
                                                                    </h1>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                    
                                                </td>
                                            </tr>
                                            <tr>
                                                <td align='center' valign='top'>
                    
                                                    <table border='0' cellpadding='0' cellspacing='0'
                                                        width='100%'
                                                        id='m_-7628188207803792935template_body'>
                                                        <tbody>
                                                            <tr>
                                                                <td valign='top'
                                                                    id='m_-7628188207803792935body_content'
                                                                    style='background-color:#fff'
                                                                    bgcolor='#fff'>
                    
                                                                    <table border='0' cellpadding='20'
                                                                        cellspacing='0' width='100%'>
                                                                        <tbody>
                                                                            <tr>
                                                                                <td valign='top'
                                                                                    style='padding:48px 48px 32px'>
                                                                                    <div id='m_-7628188207803792935body_content_inner'
                                                                                        style='color:#636363;font-family:&quot;Helvetica Neue&quot;,Helvetica,Roboto,Arial,sans-serif;font-size:14px;line-height:150%;text-align:left'
                                                                                        align='left'>
                                                                                        <p
                                                                                            style='margin:0 0 16px'>
                                                                                           Xin chào $name
                                                                                        </p>
                                                                                        <p
                                                                                            style='margin:0 0 16px'>
                                                                                            Bạn vừa nhận
                                                                                            được đơn hàng từ
                                                                                            INFOTECH, Đơn
                                                                                            hàng như sau:
                                                                                        </p>
                    
                                                                                       
                    
                                                                                        <div
                                                                                            style='margin-bottom:40px'>
                                                                                            <table
                                                                                                cellspacing='0'
                                                                                                cellpadding='6'
                                                                                                border='1'
                                                                                                style='color:#636363;border:1px solid #e5e5e5;vertical-align:middle;width:100%;font-family:'Helvetica Neue,Helvetica,Roboto,Arial,sans-serif'
                                                                                                width='100%'>
                                                                                                <thead>
                                                                                                    <tr>
                                                                                                        <th scope='col'
                                                                                                            style='color:#636363;border:1px solid #e5e5e5;vertical-align:middle;padding:12px;text-align:left'
                                                                                                            align='left'>
                                                                                                            Sản
                                                                                                            phẩm
                                                                                                        </th>
                                                                                                        <th scope='col'
                                                                                                            style='color:#636363;border:1px solid #e5e5e5;vertical-align:middle;padding:12px;text-align:left'
                                                                                                            align='left'>
                                                                                                            Số
                                                                                                            lượng
                                                                                                        </th>
                                                                                                        <th scope='col'
                                                                                                            style='color:#636363;border:1px solid #e5e5e5;vertical-align:middle;padding:12px;text-align:left'
                                                                                                            align='left'>
                                                                                                            Giá
                                                                                                        </th>
                                                                                                    </tr>
                                                                                                </thead>
                                                                                                <tbody>                                                                                                   
                                                                                                  $item
                                                                                                </tbody>
                                                                                                <tfoot>
                                                                                                    <tr>
                                                                                                        <th scope='row'
                                                                                                            colspan='2'
                                                                                                            style='color:#636363;border:1px solid #e5e5e5;vertical-align:middle;padding:12px;text-align:left;'
                                                                                                            align='left'>
                                                                                                            Tổng
                                                                                                            số
                                                                                                            phụ:
                                                                                                        </th>
                                                                                                        <td style='color:#636363;border:1px solid #e5e5e5;vertical-align:middle;padding:12px;text-align:left;'
                                                                                                            align='left'>
                                                                                                            <span>0<span> VND</span></span>
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                    <tr>
                                                                                                        <th scope='row'
                                                                                                            colspan='2'
                                                                                                            style='color:#636363;border:1px solid #e5e5e5;vertical-align:middle;padding:12px;text-align:left'
                                                                                                            align='left'>
                                                                                                            Phương
                                                                                                            thức
                                                                                                            thanh
                                                                                                            toán:
                                                                                                        </th>
                                                                                                        <td style='color:#636363;border:1px solid #e5e5e5;vertical-align:middle;padding:12px;text-align:left'
                                                                                                            align='left'>
                                                                                                            $pay
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                    <tr>
                                                                                                        <th scope='row'
                                                                                                            colspan='2'
                                                                                                            style='color:#636363;border:1px solid #e5e5e5;vertical-align:middle;padding:12px;text-align:left'
                                                                                                            align='left'>
                                                                                                            Tổng
                                                                                                            cộng:
                                                                                                        </th>
                                                                                                        <td style='color:#636363;border:1px solid #e5e5e5;vertical-align:middle;padding:12px;text-align:left'
                                                                                                            align='left'>
                                                                                                            <span><span>$</span>" . number_format($_SESSION['total']) . "</span>
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                    <tr>
                                                                                                        <th scope='row'
                                                                                                            colspan='2'
                                                                                                            style='color:#636363;border:1px solid #e5e5e5;vertical-align:middle;padding:12px;text-align:left'
                                                                                                            align='left'>
                                                                                                            Chú thích:
                                                                                                        </th>
                                                                                                        <td style='color:#636363;border:1px solid #e5e5e5;vertical-align:middle;padding:12px;text-align:left'
                                                                                                            align='left'>
                                                                                                            <span>$note</span>
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                </tfoot>
                                                                                            </table>
                                                                                        </div>
                    
                                                                                        <table
                                                                                            id='m_-7628188207803792935addresses'
                                                                                            cellspacing='0'
                                                                                            cellpadding='0'
                                                                                            border='0'
                                                                                            style='width:100%;vertical-align:top;margin-bottom:40px;padding:0'
                                                                                            width='100%'>
                                                                                            <tbody>
                                                                                                <tr>
                                                                                                    <td valign='top'
                                                                                                        width='50%'
                                                                                                        style='text-align:left;font-family:'Helvetica Neue',Helvetica,Roboto,Arial,sans-serif;border:0;padding:0'
                                                                                                        align='left'>
                                                                                                        <h2
                                                                                                            style='color:#e84393;display:block;font-family:&quot;Helvetica Neue&quot;,Helvetica,Roboto,Arial,sans-serif;font-size:18px;font-weight:bold;line-height:130%;margin:0 0 18px;text-align:left'>
                                                                                                            Địa
                                                                                                            chỉ
                                                                                                            thanh
                                                                                                            toán
                                                                                                        </h2>
                    
                                                                                                        <address
                                                                                                            style='padding:12px;color:#636363;border:1px solid #e5e5e5'>
                                                                                                            $name<br>$address
                                                                                                            <br><a
                                                                                                                href='tel:0923343434'
                                                                                                                style='color:#e84393;font-weight:normal;text-decoration:underline'
                                                                                                                target='_blank'>$phone</a>
                                                                                                            <br><a
                                                                                                                href='mailto:$email'
                                                                                                                target='_blank'>$email</a>
                                                                                                        </address>
                                                                                                    </td>
                                                                                                </tr>
                                                                                            </tbody>
                                                                                        </table>
                                                                                        <p
                                                                                            style='margin:0 0 16px'>
                                                                                            Cảm ơn quý khách đã mua hàng tại cửa hàng của chúng tôi!</p>
                                                                                        
                                                                                    </div>
                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                    
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                    
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                            </table>
                        </div>
                    </td>
                    <td></td>
                </tr>
            </tbody>
        </table>
        <div class='yj6qo'></div>
        <div class='adL'>
        </div>
    </div>
    <div class='adL'>
    </div>
</div>";
            thanhToanVaGuiEmail($email, $tieuDe, $noiDung);
            header('Location: /checkout/thankyou/');
            $_SESSION['cart_code'] = $cart_code;
            unset($_SESSION['cart']);
        }
    }
        $this->view('ClientMasterLayout', [
            'pages' => 'CheckoutClientPage'
        ]);
    }

    public function thankyou(){
        $this->view('ClientMasterLayout', [
            'pages' => 'ThankYouPage'
        ]);
    }
}
