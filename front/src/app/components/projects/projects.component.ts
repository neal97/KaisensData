import { Component, OnInit } from '@angular/core';
import { ArticleService } from 'src/app/services/article.service';

@Component({
  selector: 'app-projects',
  templateUrl: './projects.component.html',
  styleUrls: ['./projects.component.css']
})
export class ProjectsComponent implements OnInit {
  articles!: any[]
  loaded!: boolean
  requestStarted!: boolean

  constructor(
    private articleService: ArticleService
  ) {
    this.loaded = false
    this.requestStarted = false;
  }

ngOnInit(): void {
    this.loaded = false
    this.requestStarted = true
    this.articleService.getAll().subscribe({
      next: (res: any) => {
        console.log(res)
        this.articles = res.data
        this.loaded = true
        this.requestStarted = false;
      }
    })
  }
}
