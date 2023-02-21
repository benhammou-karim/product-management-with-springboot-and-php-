package com.ikrame.prod.controller;

import com.ikrame.prod.entities.User;
import com.ikrame.prod.service.UserService;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.web.bind.annotation.CrossOrigin;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestMethod;
import org.springframework.web.bind.annotation.RestController;

import java.util.List;
//// ce controlleur liste les utilisateurs
@RestController
@RequestMapping("/userjson")
@CrossOrigin
public class UserJsonController {
    @Autowired
    UserService userService;
    @RequestMapping(method = RequestMethod.GET)
    public List<User> getAllUsers(){
        return userService.getAllUser();
    }
}
