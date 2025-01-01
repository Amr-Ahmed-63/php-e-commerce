<!-- <script src="../jequery.js"></script> -->
<script>

$(document).ready(function() {

    $(".sub").click(function(){

        var name = $("._name").val()
        var email = $("._email").val()
        var phone = $("._phone").val()
        var message = $("._message").val()

        $("._form").submit(function(e){
            e.preventDefault()
            if(!name){
                $("._name").attr("placeholder","please enter your name").addClass("redp")
            }
            if(!email){
                $("._email").attr("placeholder","please enter your email").addClass("redp")
            }
            if(!phone){
                $("._phone").attr("placeholder","please enter your phone").addClass("redp")
            }
            if(!message){
                $("._message").attr("placeholder","please enter your message").addClass("redp")
            }
            
        })
    
    
        $.post("../admin/fun/messages/add.php",{
            name:name,
            email:email,
            phone:phone,
            message:message
        },function(data){
            $(".call").html(data)
            setTimeout(()=>{
                $(".call").html("")
                name = $("._name").val("")
                email = $("._email").val("")
                phone = $("._phone").val("")
                message = $("._message").val("")
            },2000)
        })
    })

    
    

})


    
    
    
    

     
</script>