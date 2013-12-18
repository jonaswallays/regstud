<?
/****************************************************************/
/*         Content Management System                       */
/* -------------------------------------------------------------*/
/*                                        */
/*    File         : class_mail_attachment.php        */
/*    Version        : 1.0.1                    */
/*    Last modified    : 20/05/2006                */
/*                                */
/*    Author        : B.Kreleger */
/*                                                              */
/****************************************************************/

/*    Description                        */
/*--------------------------------------------------------------*/
/*    Mail class which can send optional attachments.        */

error_reporting(E_ALL);

class MailAttach
{
    //-----------------------
    //-- constructor
    //-----------------------
    function MailAttach()
    {
        //-----------------------
        //-- config (change this)
        //-----------------------
        
        $this->go_email = "stefaan@stefaandecock.be"; // to e-mail address
        $this->go_name = "Stefaan"; // to name
        
        $this->reply_email = "stefaan.decock@hogent.be"; // from e-mail address
        $this->reply_name = "Stefaan"; // from name
        
        //-- attachment settings
        $this->mb = 1048576; // 1Mb in bytes
        $this->max_file_size = 5; // Max file size of attachment(s) in Mb's
        
        $this->file_size_count = 1; // 1 = total size of all attachments
                        // 2 = size per attachment
        
        //-----------------------
        //-- errors
        //-----------------------
        
        //-- file error
        $this->error[0] = "<pre><code><b>Error 0:</b><br />Mail could not be send: File could not be opened or does not exist.</code></pre>";
        
        //-- file error
        $this->error[1] = "<pre><code><b>Error 1:</b><br />Mail could not be send: Filesize is unkown.</code></pre>";
        
        //-- sendmail error
        $this->error[2] = "<pre><code><b>Error 2:</b><br />Mail could not be send: Something's wrong with the mail function.</code></pre>";
        
        //-- attachment error
        $this->error[3] = "<pre><code><b>Error 3:</b><br />Mail could not be send: Attachment is too big (max: " . $this->mb * $this->max_file_size . " bytes).</code></pre>";
        
        //-- attachment error
        $this->error[4] = "<pre><code><b>Error 4:</b><br />Mail could not be send: Attachment is not unique.</code></pre>";
        
        //-----------------------
        //-- results
        //-----------------------
        
        //-- email with attachment sent
        $this->result[0] = "<p><b>E-mail met bijlage verstuurd</b></p>";
        
        //-- email without attachment sent
        $this->result[1] = "<p><b>E-mail verstuurd</b></p>";
    }
    
    //-----------------------
    //-- sendmail function
    //-----------------------
    function SendMailAttach ($subject, $message, $files = '', $to_name = '', $to_email = '', $from_name = '', $from_email = '')
    {
        //-- generate boundary
        $bound = md5(uniqid(time()));
        
        //-- check for "TO" addresses
        if (empty($to_name))
            $to_name = $this->go_name;
        if (empty($to_email))
            $to_email = $this->go_email;

        //-- check for "FROM" adresses
        if (empty($from_name))
            $from_name = $this->reply_name;
        if (empty($from_email))
            $from_email = $this->reply_email;
            
        if (!empty($files))
        {
            $headers = "From: " . $from_name . " <" . $from_email . ">\r\n";
            $headers .= "MIME-Version: 1.0\r\n";
            
            //-- mixed
            $headers .= "Content-Type: multipart/mixed; boundary=\"" . $bound . "\"\r\n";
            
            //-- sent attachment
            $headers .= "Content-Disposition:  attachment\r\n";
            
            //-- create body
            $body = "This is a multi-part message in MIME format.\r\n";
            $body .= "\r\n";
            
            //-- bound
            $body.= "--" . $bound . "\r\n";
            
            //-- charset
            $body.= "Content-Type: text/plain; charset=iso-8859-1\r\n";
            
            //-- 7bit coding
            $body.= "Content-Transfer-Encoding: 7bit\r\n";
            $body.= "\r\n";
            
            //-- message
            $body.= $message ."\r\n";
            
            foreach($files as $filename)
            {
                //-- set array with filename
                if (empty($attachment_name))
                    $attachment_name = array();
                
                if (in_array($filename, $attachment_name))
                    die($this->error[4]);
                else
                    $attachment_name[] = $filename;
                
                //-- read content
                if ($fp = @fopen($filename, 'r'))
                {
                    if ($filesize = @filesize($filename))
                        $inhoud = fread($fp, $filesize);
                    else
                        die($this->error[1]);
                        
                    fclose($fp);
                }
                else
                    die($this->error[0]);
                    
                //-- check if filesize is below maximum
                if ($filesize > ($this->mb * $this->max_file_size))
                    die($this->error[3]);
                    
                //-- check for filesize counting
                if ($this->file_size_count == 1)
                {
                    //-- calculate total of all files
                    if (empty($total_filesize))
                        $total_filesize = $filesize;
                    else
                    {
                        $total_filesize = $total_filesize + $filesize;
                        
                        //-- check if total filesize is below maximum
                        if ($total_filesize > ($this->mb * $this->max_file_size))
                            die($this->error[3]);
                    }
                }
                
                //-- bound
                $body .= "--" . $bound . "\r\n";
                
                //-- userfriendly filename
                $show_filename_array = explode("/", $filename);
                $show_filename = $show_filename_array[count($show_filename_array)-1];
                                
                //-- content type + name file
                $body .= "Content-Type: application/octet-stream; name=" . $show_filename . ";\r\n";
                
                //-- base64 encoding
                $body .= "Content-Transfer-Encoding: base64\r\n";
                
                //-- attached as attachment
                $body .= "Content-disposition: attachment\r\n";
                $body .= "\n";
                
                //-- content of attachment
                $body .= chunk_split(base64_encode($inhoud)) . "\r\n";
            }
            
            if (mail($to_name . " <" . $to_email . ">", $subject, $body, $headers))
                return $this->result[0];
            else
                die($this->error[2]);
        }
        //-- no attachment has been added, send e-mail without attachment
        else
        {
            $headers = "From: " . $from_name . " <" . $from_email . ">\r\n";
               $headers .= "MIME-Version: 1.0\r\n";
               $message;
               
               mail($to_name . " <" . $to_email . ">", $subject, $message, $headers);
               
               return $this->result[1];
         }
     }
}
?>