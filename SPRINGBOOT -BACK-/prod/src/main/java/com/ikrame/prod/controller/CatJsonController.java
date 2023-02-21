package com.ikrame.prod.controller;

import com.ikrame.prod.entities.Categorie;
import com.ikrame.prod.service.CategorieService;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.web.bind.annotation.CrossOrigin;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestMethod;
import org.springframework.web.bind.annotation.RestController;

import java.util.List;

@RestController
@RequestMapping("/catjson")
@CrossOrigin
public class CatJsonController {
    @Autowired
    CategorieService catService;
    @RequestMapping(method = RequestMethod.GET)
    public List<Categorie> getAllUsers(){
        return catService.getAllCategories();
    }
}
