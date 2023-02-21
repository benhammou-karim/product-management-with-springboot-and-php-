package com.ikrame.prod.controller;

import com.ikrame.prod.entities.User;
import com.ikrame.prod.service.UserService;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.web.bind.annotation.*;
import org.springframework.web.servlet.view.RedirectView;

import javax.servlet.http.HttpServletResponse;
import java.text.ParseException;

@RestController
@RequestMapping("/user")
@CrossOrigin
public class UserPHPController {
    @Autowired
    UserService userService;

    @GetMapping(value = "/saveUser/image/{image}/password/{password}/role/{role}/mail/{mail}")
    public void saveUser(HttpServletResponse httpServletResponse, @ModelAttribute("user") User user, @PathVariable("image") String image, @PathVariable("mail") String mail, @PathVariable("password") String passwd, @PathVariable("role") Long admn) throws ParseException {

       user.setImage(image);
        user.setMail(mail);
        user.setPasswd(passwd);
        user.setAdmn(admn);

        User saveUser = userService.saveUser(user);

        String url = "http://localhost/prod/list_user.php";
        httpServletResponse.setHeader("Location", url);
        httpServletResponse.setStatus(302);

    }

    ///////////////////////
    @GetMapping("/supprimerUser/id/{id}")
    public void supprimerUser(@PathVariable("id") Long id, HttpServletResponse httpServletResponse) {
        userService.deleteUserById(id);
        String url = "http://localhost/prod/list_user.php";
        httpServletResponse.setHeader("Location", url);
        httpServletResponse.setStatus(302);

    }
    ///////////////////////
    @RequestMapping("/modifierUser/id/{id}")
    public void editerUser(@PathVariable("id") Long id, HttpServletResponse httpServletResponse) {
        User u = userService.getUser(id);
        String url = "http://localhost/prod/mod_user.php?id=" + u.getId_user() + "&image=" + u.getImage() + "&mail=" + u.getMail() + "&password=" + u.getPasswd()+ "&role=" + u.getAdmn()+ "&bool=" + 1;
        httpServletResponse.setHeader("Location", url);
        httpServletResponse.setStatus(302);
    }

    @RequestMapping("/updateUser")
    public RedirectView updateUser(@ModelAttribute("user") User user) throws ParseException {
        userService.updateUser(user);
        RedirectView redirectView = new RedirectView();
        redirectView.setUrl("http://localhost/prod/list_user.php");
        return redirectView;
    }
}



