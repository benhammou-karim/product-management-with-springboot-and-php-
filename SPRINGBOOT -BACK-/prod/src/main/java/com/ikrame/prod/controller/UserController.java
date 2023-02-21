package com.ikrame.prod.controller;

import com.ikrame.prod.entities.User;
import com.ikrame.prod.service.UserService;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.web.bind.annotation.*;

import javax.servlet.http.HttpServletResponse;
import java.util.List;

@RestController
@RequestMapping("/UA")
@CrossOrigin
public class UserController {
    @Autowired
    UserService userService;

    @GetMapping(value = "/testerUser/login/{login}/passwd/{passwd}")
    public void testerUser(@PathVariable("login") String login,@PathVariable("passwd") String passwd, HttpServletResponse httpServletResponse) {
        List<User> user = userService.getAllUser();
        int token=0;
        boolean valid=false;
        for (User u : user){
            if(u.getMail().equals(login)){
                if(u.getPasswd().equals(passwd)){
                    String url;
                    if(u.getAdmn()==1){
                        token = 1;
                        url = "http://localhost/prod/token.php?token=" + token;
                        httpServletResponse.setHeader("Location", url);
                        httpServletResponse.setStatus(302);
                        break;
                    }else{
                        token = 2;
                        url = "http://localhost/prod/token.php?token=" + token;
                        httpServletResponse.setHeader("Location", url);
                        httpServletResponse.setStatus(302);
                        break;
                    }
                }else{
                    String url = "http://localhost/prod/index.php?msg=le password est incorrect";
                    httpServletResponse.setHeader("Location", url);
                    httpServletResponse.setStatus(302);
                    valid=true;
                    break;
                }
            }
        }
        if(token==0 && valid==false) {
            String url = "http://localhost/prod/index.php?msg=pas d'utilisateur avec ce mail";
            httpServletResponse.setHeader("Location", url);
            httpServletResponse.setStatus(302);
        }

    }

}
