//
//  User.swift
//  iStory
//
//  Created by Helga Eka on 28/11/18.
//  Copyright © 2018 Aldo Purwanto. All rights reserved.
//

import Foundation

class User : NSObject{
    var full_name: String;
    var password: String;
    var email: String;
    
    init(json: [String: Any]) {
        self.full_name = json["full_name"] as? String ?? ""
        self.password = json["password"] as? String ?? ""
        self.email = json["email"] as? String ?? ""
    }
    
    func printData(){
        
        print(
            "full name : ",self.full_name,
            "email : ",self.email,
            "password : ",self.password
        )
    }
    
    
}
