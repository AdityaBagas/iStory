//
//  AccountController.swift
//  iStory
//
//  Created by Chris Robert on 26/11/18.
//  Copyright © 2018 Aldo Purwanto. All rights reserved.
//

import UIKit

class AccountController: UIViewController, UIImagePickerControllerDelegate, UINavigationControllerDelegate {
    
    let URL_JSON = "https://databases.000webhost.com/sql.php?server=1&db=id7965068_istory&table=accounts&pos=0&token=4ebc316a311644b5f59a735c93523f91"
    var user = [User]()
    
    @IBOutlet weak var nameLabel: UILabel!
    @IBOutlet weak var emailLabel: UILabel!
    @IBOutlet weak var bioLabel: UILabel!
    
    override func viewDidLoad() {
        let full_name = UserDefaults.standard.string(forKey: "full_name")
        self.nameLabel.text = full_name
        let email = UserDefaults.standard.string(forKey: "email")
        self.emailLabel.text = email
//        let biodata = UserDefaults.standard.string(forKey: "biodata")
//        self.bioLabel.text = biodata
        super.viewDidLoad()
        getJson(urlString: URL_JSON)
    }
    
    @IBAction func optionsBtn(_ sender: Any) {
        let actionSheet = UIAlertController(title: nil, message: "Choose Option", preferredStyle: .actionSheet)
        
        actionSheet.addAction(UIAlertAction(title: "Sign Out", style: .destructive, handler: {
            action in
            
            let alertController = UIAlertController(title: "Sign Out", message:
                "Are you sure want to Sign Out?", preferredStyle: UIAlertController.Style.alert)
            alertController.addAction(UIAlertAction(title: "No", style: UIAlertAction.Style.cancel,handler: nil))
            alertController.addAction(UIAlertAction(title: "Sign Out", style: UIAlertAction.Style.default,handler: {
                action in
                self.performSegue(withIdentifier: "MainSignedOut", sender: nil)
            }))
            
            self.present(alertController, animated: true, completion: nil)
        }))
        actionSheet.addAction(UIAlertAction(title: "Edit", style: .default, handler: {
            action in
            self.performSegue(withIdentifier: "EditAccount", sender: nil)
        }))
        actionSheet.addAction(UIAlertAction(title: "Cancel", style: .cancel, handler: nil))
        
        self.present(actionSheet, animated: true, completion: nil)
    }
    
    @IBAction func saveBtn(_ sender: Any) {
    }
    
    @IBAction func cancelBtn(_ sender: Any) {
        dismiss(animated: true, completion: nil)
    }
    
    fileprivate func getJson(urlString :String)
    {
        let url = URL(string: urlString)
        URLSession.shared.dataTask(with: url!){
            (data,responds,err) in
            if err != nil{
                print("error",err ?? "")
                
            }else{
                if let useable = data{
                    do{
                        let jsonObject = try JSONSerialization.jsonObject(with: useable, options: .mutableContainers) as AnyObject
                        
                        print(jsonObject)
                        
                        let user = jsonObject as? [AnyObject]
                        for us in user! {
                            let u = User(json: us as! [String:Any])
                            self.user.append(u)
                        }
                        
//                        DispatchQueue.main.async(execute : {
//                            self.tableView.reloadData()
//                        })
                        
                    }
                    catch{
                        print("catch error")
                    }
                }
                
                
            }
            }.resume()
        
    }
    
    @IBOutlet weak var userImage: UIImageView!
    
    @IBAction func btnImage(_ sender: Any) {
        let optionMenu = UIAlertController(title: nil, message: "Pilih Cara Menampilkan", preferredStyle: .actionSheet)
        
        let kameraAction = UIAlertAction(title: "Kamera", style: .default){ action in
            if UIImagePickerController.isSourceTypeAvailable(UIImagePickerController.SourceType.camera){
                let imagePicker = UIImagePickerController()
                imagePicker.delegate = self
                imagePicker.sourceType = UIImagePickerController.SourceType.camera
                imagePicker.allowsEditing = false
                self.present(imagePicker, animated: true, completion: nil)
            }
        }
        let galleryAction = UIAlertAction(title: "Gallery", style: .default){ action in
            if UIImagePickerController.isSourceTypeAvailable(.camera){
                let imagePicker = UIImagePickerController()
                imagePicker.delegate = self
                
                imagePicker.allowsEditing = false
                
                imagePicker.sourceType = UIImagePickerController.SourceType.camera
                self.present(imagePicker, animated: false, completion: nil)
            }else{
                let imagePicker = UIImagePickerController()
                imagePicker.delegate = self
                
                imagePicker.allowsEditing = false
                imagePicker.sourceType = UIImagePickerController.SourceType.photoLibrary
                self.present(imagePicker, animated: false, completion: nil)
            }
        }
        
        let cancelAction = UIAlertAction(title: "Cancel", style: .cancel)
        
        optionMenu.addAction(kameraAction)
        optionMenu.addAction(galleryAction)
        optionMenu.addAction(cancelAction)
        
        present(optionMenu, animated: true, completion: nil)
    }
    
    func imagePickerController(_ picker: UIImagePickerController, didFinishPickingMediaWithInfo info: [UIImagePickerController.InfoKey : Any]) {
        if let image = info[UIImagePickerController.InfoKey.originalImage] as? UIImage{
            userImage.image = image
        }else if let pickedImage = info[UIImagePickerController.InfoKey.originalImage] as? UIImage{
            userImage.contentMode = .scaleToFill
            userImage.image = pickedImage
        }else{
            print("error")
        }
        
        self.dismiss(animated: false, completion: nil)
        picker.dismiss(animated: true, completion: nil)
    }
}
