
    window.onload=function(){
      document.getElementById("download")
      .addEventListener("click,()=>{
        const record = this.document.getElementById("record");
        console.log(record);
        html2pdf().from(record).save();
      }

    
  
 