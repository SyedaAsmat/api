<html>
    <head>
    <script>
        function validate() {
            if(document.user_reg.firstname.value == "" ) {
                alert( "Please provide your First Name!" );
                document.dReg.firstame.focus() ;
                return false;
            }
            if(document.user_reg.lastname.value == "" ) {
                alert( "Please provide your Last Name!" );
                document.dReg.lastame.focus() ;
                return false;
            }
            if(document.user_reg.role.value == "default"){
                alert('Please select your Role from the list!');
                document.user.role.focus();
                return false;
            }
            if(document.user_reg.phone.value == "" ) {
                alert( "Please provide your Contact Details!" );
                document.dReg.phone.focus() ;
                return false;
            }
            if(document.user_reg.email.value == "" ) {
                alert( "Please provide your Email!" );
                document.user_reg.email.focus() ;
                return false;
            }
            var p=document.user_reg.password.value;
            var cp = document.user_reg.cpassword.value;
            if(p == "" ) {
                alert( "Please provide a Password!" );
                document.user_reg.password.focus() ;
                return false;
            }
            if(cp == "" ) {
                alert( "Please confirm your Password!" );
                document.user_reg.cpassword.focus() ;
                return false;
            }
            if(p != cp){
                alert( "Password doesn't match! Please re-enter!" );
                document.user_reg.confirm_password.focus() ;
                return false;
            }
        }
        return( true );
    </script>
    </head>
    <body>
        <h3 Align="center">Registration Form</h3>
        <form name=user_reg method="post" action="add_user.php" enctype="multipart/form-data" Align="center">
            <table Align="center" cellpadding="5" cellspacing="5">
                <tr>
                    <th><Label>First Name</Label> </th>
                    <td><input  class="" name="firstname" maxlength="10" placeholder=" Your First Name" autocomplete="off"></td>
                </tr>
                <tr>
                    <th><Label>Last Name</Label></th>
                    <td><input class="" name="lastname" maxlength="10" placeholder="Your Last Name" autocomplete="off"> </td>
                </tr>
                <tr>
                    <th><Label>Role</Label></th>
                    <td>
                        <select class="input-field" name="role">
                            <option value="default">---Select---</option>
                            <option value="Writer">Writer</option>
                            <option value="Editor">Editor</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th><Label>Email</Label></th>
                    <td><input class="" name="email" maxlength="20" placeholder="Your Email" autocomplete="off"> </td>
                </tr>
                <tr>
                    <th><Label>Contact</Label></th>
                    <td><input class="" name="phone" type="text" maxlength="10" placeholder="Your Contact" autocomplete="off"> </td>
                </tr>
                <tr>
                    <th><Label>Password</Label></th>
                    <td><input class="" name="password" type="password" maxlength="10" placeholder="Your Password" autocomplete="off"> </td>
                </tr>
                <tr>
                    <th><Label>Confirm Password</Label></th>
                    <td><input class="" name="cpassword" type="password" maxlength="10" placeholder="Your Password" autocomplete="off"> </td>
                </tr>
            </table>
            <button class="" type="reset" value="Clear">Reset</button>&nbsp&nbsp&nbsp&nbsp
            <button class="" type="submit" name="submit" onclick="return validate();">Submit</button>
        </form>
    </body>
</html>