//
//  EditAccountController.swift
//  iStory
//
//  Created by Helga Eka on 28/11/18.
//  Copyright © 2018 Aldo Purwanto. All rights reserved.
//

import UIKit

class SecondViewController: UIViewController, UIImagePickerControllerDelegate, UINavigationControllerDelegate {
    
    @IBOutlet weak var userImage: UIImageView!
    override func viewDidLoad() {
        super.viewDidLoad()
        
        // Do any additional setup after loading the view.
    }
    
    
    @IBAction func exitAction(_ sender: Any) {
        performSegue(withIdentifier: "exitVC", sender: self)
    }
    
    @IBAction func actionGambar(_ sender: Any) {
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
    /*
     UIViewController, UIImagePickerControllerDelegate, UINavigationControllerDelegate {
     
     @IBOutlet weak var userImage: UIImageView!
     @IBAction func cameraAction(_ sender: Any) {
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
     @IBAction func takePhoto(_ sender: Any) {
     if UIImagePickerController.isSourceTypeAvailable(UIImagePickerController.SourceType.camera){
     let imagePicker = UIImagePickerController()
     imagePicker.delegate = self
     imagePicker.sourceType = UIImagePickerController.SourceType.camera
     imagePicker.allowsEditing = false
     self.present(imagePicker, animated: true, completion: nil)
     }
     }
     override func viewDidLoad() {
     super.viewDidLoad()
     // Do any additional setup after loading the view, typically from a nib.
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
     */
}

