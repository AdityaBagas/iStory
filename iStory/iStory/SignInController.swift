//
//  SignInController.swift
//  iStory
//
//  Created by Chris Robert on 20/11/18.
//  Copyright © 2018 Aldo Purwanto. All rights reserved.
//

import UIKit
import Alamofire

class SignInController: UIViewController {
    
    let URL_JSON = "https://istory.uajyproject.site/user_login.php"
    
    @IBOutlet weak var txtEmail: UITextField!
    @IBOutlet weak var txtPassword: UITextField!
    
    override func viewDidLoad() {
        super.viewDidLoad()
    }
    
    @IBAction func loginBtn(_ sender: Any) {
        let requestURL = NSURL(string: URL_JSON)
        let request = NSMutableURLRequest(url: requestURL! as URL)
        request.httpMethod = "POST"
        
        let email       = txtEmail.text!
        let password    = txtPassword.text!
        
        let parameters: Parameters = [
            "email": txtEmail.text!,
            "password": txtPassword.text!
        ]
        
        if((email.isEmpty) || (password.isEmpty))
        {
            let alertControllerField = UIAlertController(title: "Alert", message:
                "Fill out empty text field!", preferredStyle: UIAlertController.Style.alert)
            alertControllerField.addAction(UIAlertAction(title: "OK", style: UIAlertAction.Style.default,handler: nil))
            
            self.present(alertControllerField, animated: true, completion: nil)
            return;
        }
        
        Alamofire.request(URL_JSON, method: .post, parameters: parameters).responseJSON
        {
            response in
            print(response)
            
            if let result = response.result.value {
                
                let jsonData = result as! NSDictionary
                
                if((jsonData.value(forKey: "response") as! Bool)){

                    let full_name   = jsonData.value(forKey: "user_full_name") as? String
                    let email       = jsonData.value(forKey: "user_email") as? String

                    UserDefaults.standard.setValue(full_name, forKey: "full_name")
                    UserDefaults.standard.setValue(email, forKey: "email")
                    
                    self.performSegue(withIdentifier: "MainSignedIn", sender: nil)
                }
                else {
                    let alertController = UIAlertController(title: "Failed", message:
                        "Make sure your account is active and email or password is right!", preferredStyle: UIAlertController.Style.alert)
                    alertController.addAction(UIAlertAction(title: "OK", style: UIAlertAction.Style.default,handler: nil))
                    
                    self.present(alertController, animated: true, completion: nil)
                }
            }
        }
    }
    
    @IBAction func cancelBtn(_ sender: UIBarButtonItem) {
        dismiss(animated: true, completion: nil)
    }
    
}
