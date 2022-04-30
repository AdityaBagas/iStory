//
//  StoryController.swift
//  iStory
//
//  Created by Chris Robert on 26/11/18.
//  Copyright © 2018 Aldo Purwanto. All rights reserved.
//

import UIKit

class StoryController: UIViewController {
    
    let URL_JSON = "https://istory.uajyproject.site/addStory.php"
    
    @IBOutlet weak var titleLabel: UITextField!
    @IBOutlet weak var storyView: UITextView!
    
    @IBAction func postBtn(_ sender: UIBarButtonItem) {
        
        let requestURL = NSURL(string: URL_JSON)
        let request = NSMutableURLRequest(url: requestURL! as URL)
        request.httpMethod = "POST"
        
        let title   = titleLabel.text!
        let content = storyView.text!
        
        if((title.isEmpty) || (content.isEmpty))
        {
            let alertControllerField = UIAlertController(title: "Alert", message:
                "Fill out empty text field!", preferredStyle: UIAlertController.Style.alert)
            alertControllerField.addAction(UIAlertAction(title: "OK", style: UIAlertAction.Style.default,handler: nil))
            
            self.present(alertControllerField, animated: true, completion: nil)
            return;
        }
        else {
            let postParameters = "title="+title+"&content="+content;
            request.httpBody = postParameters.data(using: String.Encoding.utf8)
        }
        
        let task = URLSession.shared.dataTask(with: request as URLRequest){
            data, response, error in
            
            if error != nil{
                print("error is \( error )")
                return;
            }
            
            do {
                let myJSON =  try JSONSerialization.jsonObject(with: data!, options: .mutableContainers) as? NSDictionary
                
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
        
        self.navigationController?.popViewController(animated: true)
        self.dismiss(animated: true, completion: nil)
    }

    override func viewDidLoad() {
        super.viewDidLoad()
    }
    
    
    @IBAction func cancelBtn(_ sender: UIBarButtonItem) {
        dismiss(animated: true, completion: nil)
    }
    
    
}
