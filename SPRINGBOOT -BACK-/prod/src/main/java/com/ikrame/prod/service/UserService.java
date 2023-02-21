package com.ikrame.prod.service;
import com.ikrame.prod.entities.User;
import java.util.List;
import java.util.Optional;

public interface UserService {
    User saveUser(User a);
    User updateUser(User a);
    void deleteUser(User a);
    void deleteUserById(Long id_admin);
    User getUser(Long id_user);
    List<User> getAllUser();
}
