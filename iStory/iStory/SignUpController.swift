//
//  SignUpController.swift
//  iStory
//
//  Created by Chris Robert on 20/11/18.
//  Copyright © 2018 Aldo Purwanto. All rights reserved.
//

import UIKit

class SignUpController: UIViewController {
    
    let URL_JSON = "https://istory.uajyproject.site/user_signup.php"
    
    @IBOutlet weak var txtFullName: UITextField!
    @IBOutlet weak var txtEmail: UITextField!
    @IBOutlet weak var txtPassword: UITextField!
    
    override func viewDidLoad() {
        super.viewDidLoad()
    }
    
    @IBAction func SignUpBtn(_ sender: Any) {
        
        let requestURL = NSURL(string: URL_JSON)
        let request = NSMutableURLRequest(url: requestURL! as URL)
        request.httpMethod = "POST"
        
        let full_name   = txtFullName.text!
        let email       = txtEmail.text!
        let password    = txtPassword.text!
        
        if((full_name.isEmpty) || (email.isEmpty) || (password.isEmpty))
        {
            let alertControllerField = UIAlertController(title: "Alert", message:
                "Fill out empty text field!", preferredStyle: UIAlertController.Style.alert)
            alertControllerField.addAction(UIAlertAction(title: "OK", style: UIAlertAction.Style.default,handler: nil))
            
            self.present(alertControllerField, animated: true, completion: nil)
            return;
        }
        else {
            let postParameters = "full_name="+full_name+"&email="+email+"&password="+password;
            request.httpBody = postParameters.data(using: String.Encoding.utf8)
        }
        
        let task = URLSession.shared.dataTask(with: request as URLRequest){
            data, response, error in
            
            if error != nil{
                print("error is \( error )")
                return;
            }
            
            do {
                let myJSON =  try JSONSerialization.jsonObject(with: data!, options: .allowFragments) as? NSDictionary
                
                if let parseJSON = myJSON {
                    
                    var msg : String!
                    msg = parseJSON["message"] as! String?
                    print(msg)
                    
                }
            }
            catch {
                print(error)
            }
        }
        task.resume()
        
        let alertController = UIAlertController(title: "Sign Up", message:
            "Please verify your email to activate iStory account!", preferredStyle: UIAlertController.Style.alert)
        alertController.addAction(UIAlertAction(title: "OK", style: UIAlertAction.Style.default,handler: {
            action in
            self.dismiss(animated: true, completion: nil)
        }))
        
        self.present(alertController, animated: true, completion: nil)
    }
    @IBAction func cancelBtn(_ sender: UIBarButtonItem) {
        dismiss(animated: true, completion: nil)
    }
    
}
