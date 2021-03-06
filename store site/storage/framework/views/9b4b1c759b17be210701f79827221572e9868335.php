



    <p>&nbsp;</p>

    <table style="background-color:#00000;" width="100%; " >
        <tr>
            <td>
                <table style="border: 1px solid #f1f1f1; border-collapse: collapse;" border="0" max-width="600" align="center" bgcolor="#fff">
                    <tbody >
                        <td style="background-color: #a235ec;padding: 50px 0; color: #000 ; text-align: center; width:900px;">
                            <!-- <img style="display: inline-block;" src="img/Logo.png" alt="" /> -->
                            <h1 style="color:#f1f1f1;text-align: center"><?php echo e(str_replace('_', ' ',config('app.name') )); ?></h1>
                            <p style="font-style: italic;text-align: center"><font color="white">Verification Email</font></p>
                        </td>
                        <tr>
                            <td style="padding: 50px 10px 20px 10px; color: #000000; font-family: 'Quicksand', sans-serif; font-size: 16px; line-height: 20px; text-align: center; line-height: 26px;">
                            <b>Hello, <?php echo e(@$data['username']); ?> </b>
                                <br />
                                <p>
                                    Welcome to <?php echo e(str_replace('_', ' ',config('app.name') )); ?>

                                    <br />
                                    Verify your email address by clicking on the button below:
                                </p>
                            </td>
                        </tr>
                        <td align="center">
                            <a style=" background: #7c32ff;   background-image: -webkit-linear-gradient(0deg, #7c32ff 0%, #a235ec 70%, #c738d8 100%);
                            background-image: -ms-linear-gradient(0deg, #7c32ff 0%, #a235ec 70%, #c738d8 100%); color: #fff; text-decoration: none; font-size: 14px;
                            font-weight: 400 ;  text-transform: capitalize;font-family: 'Quicksand', sans-serif;font-weight: 300;padding: 20px;margin: 5px 0;display: inline-block;
                        " href="<?php echo e(@$data['reset_url']); ?>">click here</a>
                            <!-- <a href="">
                                <img style="display: block;" src="https://www.propersix.com/mail/confirm-reg/mid-btn.png" alt="" />
                            </a> -->
                        </td>
                        <tr style="font-family: 'Quicksand', sans-serif;">
                            <td style="padding: 20px 30px 50px 40px; color: #000000; font-family: 'Quicksand', sans-serif; font-size: 16px; line-height: 20px; text-align: center; line-height: 26px;">                           
                                
                                    If you did not make this request, please do not confirm the registration!
                            </td>
                        </tr>
                    </tbody>
                </table>
            </td>
        </tr>
    </table>
    <?php /**PATH /home/u522089564/domains/infixlive.com/public_html/infixhub/resources/views/mail/resend_verify_email.blade.php ENDPATH**/ ?>