package com.ikrame.prod.service;

import com.ikrame.prod.entities.User;
import com.ikrame.prod.repos.UserRepository;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import java.util.List;
import java.util.Optional;

@Service
public class UserServiceImpl implements UserService {
    @Autowired
    UserRepository userrepository;
    @Override
    public User saveUser(User a){
        return userrepository.save(a);
    }
    @Override
    public User updateUser(User a){
        return userrepository.save(a);
    }
    @Override
    public void deleteUser(User a){
        userrepository.delete(a);
    }
    @Override
    public void deleteUserById(Long id_user){
        userrepository.deleteById(id_user);
    }
    @Override
    public User getUser(Long id_user){
        return userrepository.getById(id_user);
    }
    @Override
    public List<User> getAllUser(){
        return userrepository.findAll();
    }



}
