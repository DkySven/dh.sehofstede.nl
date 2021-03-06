from django.db import models
from PIL import Image

class ImageSubmit(models.Model):
	img = models.ImageField(upload_to='pictures')
	title = models.CharField(max_length=100)
	desc = models.CharField(max_length=500)
	tag = models.CharField(max_length=100)

	def __unicode__(self):
		return self.title

	def img_html(self):
		return u"<img src=\"%s\" alt=\"%s\" height=400/>" % (self.img.url, self.tag,)
	img_html.allow_tags = True
	
	def save(self):
		
		if not self.id and not self.img:
			return

		super(ImageSubmit, self).save()

		filename = self.img.path
		image = Image.open(filename)
		
		print dir(image)
		imgh = image.size[0]
		imgv = image.size[1]
		ratio = float(imgv)/450

		if imgv > 450:
			imgv=450
			imgh=int(imgh/ratio)

			size=(imgh, imgv)

			image.thumbnail(size, Image.ANTIALIAS)
		
		image.save(filename)
